<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'user_id' => '1',
            'title' => 'Zoo Animals More Intelligent Than Humans.',
            'body' =>  'Cras dapibus. Vivamus elementum semper Monkey Island(TM) nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.',
            'image_post' => '../storage/img/post-main-img/rijksmuseum-RJGordon-1777-86_1500px.webp',
            'image_card' => '../storage/img/post-main-img/rijksmuseum-RJGordon-1777-86_card.webp',
            'published_at' => fake()->unique()->dateTimeBetween('-2 months', 'now', null)
        ]);

        Post::create([
            'user_id' => '2',
            'title' => 'Why I Blew Up LeChuck.',
            'body' => 'Monkey Island(TM), tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.',
            'image_post' => '../storage/img/post-main-img/rijksmuseum-vanGogh-1887_1500px.webp',
            'image_card' => '../storage/img/post-main-img/rijksmuseum-vanGogh-1887_card.webp',
            'published_at' => fake()->unique()->dateTimeBetween('-2 months', 'now', null)
        ]);

        Post::create([
            'user_id' => '3',
            'title' => 'Theory and Practice of Bone Breakage.',
            'body' => 'Leo eget bibendum Monkey Island(TM) sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec imperdiet iaculis, ipsum.',
            'image_post' => '../storage/img/post-main-img/rijksmuseum-Bolswert-1624_1500px.webp',
            'image_card' => '../storage/img/post-main-img/rijksmuseum-Bolswert-1624_card.webp',
            'published_at' => fake()->unique()->dateTimeBetween('-2 months', 'now', null)
        ]);

        Post::create([
            'user_id' => '2',
            'title' => 'Things You Can Catch By Reading a Library Book.',
            'body' => 'Dolor sit amet, consectetuer adipiscing elit. Monkey Island(TM) aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, 
            fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.',
            'image_post' => '../storage/img/post-main-img/rijksmuseum-JBraakensiek-1868-1940_1500px.webp',
            'image_card' => '../storage/img/post-main-img/rijksmuseum-JBraakensiek-1868-1940_card.webp',
            'published_at' => fake()->unique()->dateTimeBetween('-2 months', 'now', null)
        ]);
    }
}
