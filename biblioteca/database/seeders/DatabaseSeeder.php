<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Libro::create([
            'nombre'=>'Harry Potter',
            'autor'=>'J.K Rowling',
            'editorial'=>'Salamandra ABC',
            'año'=>'1997',
            'unidades' => '3',
            'imagen'=>'images/harry.jpg'
        ]);

        Libro::create([
            'nombre'=>'El señor de los anillos',
            'autor'=>'J.R.R. Tolkien',
            'editorial'=>'Minorauto',
            'año'=>'1995',
            'unidades' => '3',
            'imagen'=>'images/señoranillos.jpg'
        ]);
        
        Libro::create([
            'nombre'=>'Los juegos del hambre',
            'autor'=>'Suzanne Collins',
            'editorial'=>'Scholastic Corporation',
            'año'=>'2012',
            'unidades' => '3',
            'imagen'=>'images/juegosdelhambre.jpg'
        ]);
        Libro::create([
            'nombre'=>'Las cronicas de narnia',
            'autor'=>'C S. Lewis',
            'editorial'=>'Planeta',
            'año'=>'1950',
            'unidades' => '3',
            'imagen'=>'images/cronicasnarnia.jpg'
        ]);
        Libro::create([
            'nombre'=>'The wicther: El ultimo deseo',
            'autor'=>'Andrezej Sapkowski',
            'editorial'=>'Coleccionista',
            'año'=>'2002',
            'unidades' => '3',
            'imagen'=>'images/thewitcher.jpg'
        ]);
        Libro::create([
            'nombre'=>'Assassin Creed',
            'autor'=>'Oliver Bowden',
            'editorial'=>'Minorauto',
            'año'=>'2021',
            'unidades' => '3',
            'imagen'=>'images/assassins.jpg'
        ]);
        Libro::create([
            'nombre'=>'Juego de tronos',
            'autor'=>'George R. R. Martin',
            'editorial'=>'hbo',
            'año'=>'1996',
            'unidades' => '3',
            'imagen'=>'images/juegodetronos.jpg'
        ]);
        Libro::create([
            'nombre'=>'Don quijote',
            'autor'=>'Miguel de cervantes',
            'editorial'=>'Micomicona ediciones',
            'año'=>'1605',
            'unidades' => '3',
            'imagen'=>'images/donquijote.jpg'
        ]);
        Libro::create([
            'nombre'=>'El principito',
            'autor'=>'Antoine de Saint-Exupéry',
            'editorial'=>'Salamandra',
            'año'=>'1943',
            'unidades' => '3',
            'imagen'=>'images/elprincipito.jpg'
        ]);
        Libro::create([
            'nombre'=>'El hobbit',
            'autor'=>'J. R. R. Tolkien',
            'editorial'=>'Booket',
            'año'=>'1937',
            'unidades' => '3',
            'imagen'=>'images/elhobbit.jpg'
        ]);
        Libro::create([
            'nombre'=>'Rick y morty',
            'autor'=>'Zac Gorman',
            'editorial'=>'Norma',
            'año'=>'2016',
            'unidades' => '3',
            'imagen'=>'images/assassins.jpg'
        ]);
        Libro::create([
            'nombre'=>'Marvel',
            'autor'=>'Adam Bray',
            'editorial'=>'Dorling Kindersley',
            'año'=>'2020',
            'unidades' => '3',
            'imagen'=>'images/marvel.jpg'
        ]); 
          
    }
}
