<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use App\Product;
use App\Shop;
use App\Category;
use App\Price;
use Spatie\Permission\Models\Permission;
class RolesAndPermitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    /*     role      */
        $superadmin =       Role::create(['name' => 'superadmin']);
        $businessman =      Role::create(['name' => 'businessman']);
         /*   end role   */


          /*     permission      */
         $viewarticles =   Permission::create(['name' => 'view articles']);
         $addarticles =    Permission::create(['name' => 'add articles']);
         $editarticles =   Permission::create(['name' => 'edit articles']);
         $deletearticles = Permission::create(['name' => 'delete articles']);
         $managearticles = Permission::create(['name' => 'manage articles']);


         $superadmin->givePermissionTo(Permission::all());
         $businessman->givePermissionTo(['view articles','add articles','edit articles','delete articles']);

             /*   end permission   */

           /* create users*/

           User::create([
            'name' => 'Mortadha',
            'email' => 'Mortadha@gmail.com',
            'Approved' => '1',
            'password' => Hash::make('mortadha'),
        ])->syncRoles($superadmin);
        User::create([
            'name' => 'man',
            'email' => 'man@gmail.com',
            'password' => Hash::make('businessman'),
        ])->syncRoles($businessman);
         /* create Shop*/
         factory('App\Shop', 1)->create();
         for($i=0 ; $i < 5  ; $i++){
         factory('App\Product')->create()->categories()->attach([
            rand(1,4),
            ]);
         }


         Price::create([
            'price' => 200,
            'isActive' => 1,
            'product_id'=> 1
        ]);

}
}
