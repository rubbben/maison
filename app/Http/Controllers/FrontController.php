<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{

    protected $paginate = 6;

    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }
    
    public function index(){
        
        $products = Product::paginate($this->paginate);

        return view('front.index', ['products' => $products]);
        
    }


    public function show(int $id){
       
        $products = Product::find($id);
        
        return view('front.product', ['products' => $products]);

    }


    public function showProductBySoldes(){

        $nbProducts = Product::where('code','solde')->count(); //retourne la vue soldes
        $products = Product::where('code','solde')->paginate($this->paginate);

        return view('front.index', ['products'=>$products, 'nbProducts'=>$nbProducts]); //pour renvoyer les vues dans le menue

    }


    public function productByCategory(int $id){

        view()->composer('partials.menu', function($view) use ($id){

            $view->with('category_id', $id);

        });

        $nbProducts = Product::where('category_id', $id)->count();
        $products = Product::where('category_id', $id)->paginate($this->paginate);

        return view('front.index',['products'=>$products, 'nbProducts'=>$nbProducts]);// pour renvoyer les vue dans le menue
    }


    public function productCreate(){
        $products = Product::pluck('title', 'id')->all();
        $categories = Category::pluck('title', 'id')->all();


        return view('back.create', ['products' => $products, 'categories' => $categories]);
    }


    public function store(Request $request){

        $product = Product::create($request->all());
        $product->category()->associate($request->category);

        return redirect()->route('admin')->with('message', 'success');

    }


    public function admin(){

        $products = Product::all();

        return view('back.dashboard', ['products' => $products, 'title'=>'Administration']); 

    }


    //Requête pour modifier un produit
    public function productEdit($id){
        $article = Product::find($id);
        $product = Product::select('size')->distinct()->orderByRaw('size ASC')->get();
        $categories = Category::pluck('title', 'id')->all();
        return view('back.edit', ['article' => $article, 'product'=>$product, 'categories' =>$categories]);
   }

   //Requête pour récupérer un produit modifié
   public function update(Request $request, $id){
       $this->validate($request,[
           'title'=>'required',
           'description'=>'required|string',
           'price'=>'required|numeric',
           'category_id'=>'required|integer',
           'status'=>'in:publier,brouillon',
           'code'=>'required',
           'reference'=>'required',
       ]);
       
       $product = Product::find($id);
       $product->update($request->all());
       $im=$request->file('url_image');

       if(!empty($im)){
           $link=$request->file('url_image')->store('');

           $product->update([
               'url_image'=>$link,
           ]);
        }
        
        return redirect()->route('admin', ['product'=>$product]);
    }


    //Requête pour supprimer un produit
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete($request->product);
        return redirect()->route('admin', ['product'=>$product])->with('message', 'Produit supprimé');
    } 

}
