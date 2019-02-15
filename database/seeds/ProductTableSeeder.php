<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Product::class, 12)->create()->each(function($product){
            
            //associe une category à un produit cree
            $category = App\Category::find(rand(1,2));

            //pour chaque $product on lui associe une categorie en particulier
            $product->category()->associate($category);

            //ajout des images
            //on utilise un site en ligne pour recuperer des images aleatoirement
            $link = str_random(12).'.jpg'; // hash de lien pour la sécurité (injection de scripts protection)

            $file = file_get_contents('http://placebeard.it/375/300'); //flux
            

            $product->update([
                'url_image' => $link
            ]);


            Storage::disk('local')->put($link, $file);

            $product->save();
        });
    }
}
