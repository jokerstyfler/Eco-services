<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use App\Models\Quote;
use Database\Seeders\RolesAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appeler le seeder pour les rôles et permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Insérer les produits
        Product::insert([
            ['id' => 1, 'name' => 'Produit 2', 'description' => 'Description du produit 2', 'price' => 19.99, 'image' => 'public/images/produit2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Produit 1', 'description' => 'Description du produit 2', 'price' => 19.99, 'image' => 'public/images/produit2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Produit 3', 'description' => 'Description du produit 3', 'price' => 19.99, 'image' => 'public/images/produit2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Produit 4', 'description' => 'Description du produit 4', 'price' => 59.99, 'image' => 'public/images/produit2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Produit 5', 'description' => 'Description du produit 5', 'price' => 79.99, 'image' => 'public/images/produit5.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Produit 6', 'description' => 'Description du produit 6', 'price' => 179.99, 'image' => 'public/images/produit6.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insérer les services
        Service::insert([
            ['id' => 1, 'name' => 'Service 1', 'description' => 'Description du service 1', 'price' => 99.99, 'image' => 'public/images/service1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Service 2', 'description' => 'Description du service 2', 'price' => 149.99, 'image' => 'public/images/service2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Service 3', 'description' => 'Description du service 3', 'price' => 199.99, 'image' => 'public/images/service3.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Créer des utilisateurs avec les rôles
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
        ]);
        $user->assignRole('user');

        Quote::create([
            'service_id' => 1,
            'user_id' => $user->id,
            'description' => 'Devis pour le service 1.',
        ]);

        Quote::create([
            'service_id' => 2,
            'user_id' => $user->id,
            'description' => 'Devis pour le service 2.',
        ]);
    }
}
