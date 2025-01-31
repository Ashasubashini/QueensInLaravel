<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'Timeless Elegance',
            'small_description' => 'A Classic Companion for Every Occasion.',
            'large_description' => '"Timeless Elegance" transcends fleeting trends, embracing the perpetual beauty of simplicity and grace. Its name draws from the essence of enduring style, symbolizing a piece that remains relevant, revered, and cherished across generations. Crafted for those who understand that true luxury is in the details, this watch embodies classic sophistication, featuring an expertly polished stainless steel case with a subtle yet striking bezel that catches light in all the right ways. Its elegantly simple dial, with fine hour markers and a sophisticated date window, pays homage to the purity of design. The scratch-resistant sapphire crystal is as resilient as it is refined, ensuring that "Timeless Elegance" stands the test of time. Whether attending an intimate dinner, a business meeting, or an evening gala, this watch is the perfect companion, exuding confidence and understated luxury. It’s not just a watch; it’s a symbol of the wearer’s understanding of what it means to appreciate beauty that lasts forever.',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'photos/item1Home.jpg'
        ]);

        Product::create([
            'name' => 'Luxe Horizon',
            'small_description' => 'Radiate Glamour with Every Tick.',
            'large_description' => '"Luxe Horizon" is an invitation to explore new horizons while enveloped in luxury. Its name reflects an aspiration to always reach higher, to gaze toward the distant horizon where possibilities are endless. The watch’s polished case and carefully designed dial evoke the grandeur of open skies and vast landscapes, embodying an aura of endless potential. The beautifully stitched leather strap provides comfort and elegance, and the 18k gold-plated hands stand in contrast against the rich dial, reflecting the elegance of the sun’s first light over the horizon. Every tick of "Luxe Horizon" is not just a measurement of time, but a reminder that luxury is not confined to the present moment—it’s a way of life that stretches into the future. Whether youre stepping onto a private jet or attending an elite event, "Luxe Horizon" ensures that you radiate glamour with every glance.',
            'price' => 3200.00,
            'quantity' => 5,
            'image' => 'photos/item2Home.jpg'
        ]);
        Product::create([
            'name' => 'Serenity Sky',
            'small_description' => ' Embrace Tranquility in Style.',
            'large_description' => '"Serenity Sky" captures the peaceful elegance of the sky at dawn, the delicate hues of pastel blues, soft pinks, and the golden embrace of the rising sun. The name speaks to a serene beauty that doesn’t need to be loud or boastful—its presence is felt in the quiet, tranquil moments. The watch’s refined titanium case reflects the soft light of early morning, while the minimalist dial with brushed silver accents exudes understated sophistication. The thin, luminous hands move smoothly across the dial, almost as if they are part of the very calm they represent. This timepiece was designed with those who cherish moments of stillness, the quiet beauty of the world, and the clarity that comes with inner peace. As the wearer glances at their wrist, "Serenity Sky" serves as a gentle reminder that true luxury is not just about adornment, but the tranquility that can be achieved when time is respected. With this piece, you carry a slice of serenity wherever you go.',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'photos/item5.jpg'
        ]);
        Product::create([
            'name' => ' Opulent Odayssey',
            'small_description' => 'Embark on a Journey with Every and Precision.',
            'large_description' => '"Opulent Odyssey" takes its name from a journey—a journey not just through space, but through time itself. Inspired by the explorers and adventurers of old, this timepiece reflects the opulence of discovery and the pursuit of new frontiers. The intricate gold-plated case recalls the riches brought back from far-off lands, while the watch’s robust yet graceful construction ensures it withstands any adventure. The dial, with its precise engraving and sleek design, speaks to the fine craftsmanship of a luxury watch, while the sapphire crystal offers clarity that rivals the clearest waters the explorer might have sailed upon. The leather strap, rich and durable, ensures that comfort accompanies luxury. "Opulent Odyssey" is for the modern adventurer—a watch that isn’t just worn, but lived with, and that marks every achievement with the elegance of a true masterpiece. Whether embarking on a business venture or traveling to far-flung corners of the earth, "Opulent Odyssey" is your trusted companion in the quest for excellence.',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'photos/item3Home.jpg'
        ]);
        Product::create([
            'name' => 'Golden Aurora',
            'small_description' =>  'Illuminate Your Wrist with Golden Radiance.',
            'large_description' => '"Golden Aurora" channels the mysterious beauty of the aurora borealis—the ethereal lights that dance across the sky in vivid hues of green and gold. The name itself evokes the magical allure of a light show like no other, a spectacle that symbolizes rare beauty and power. The watch’s golden case gleams like the first rays of dawn as they break over the horizon, casting a glow that captivates all who lay eyes upon it. The shimmering dial mirrors the lights of the aurora, with subtle gradients of color that appear to shift with the light. The dial’s markers, crafted from radiant gold, are reminiscent of stars that dot the night sky, while the sapphire crystal offers clarity that ensures you can always see the brilliance of your watch in every lighting. Worn by those who seek to illuminate their world with grace, "Golden Aurora" is an embodiment of rare beauty—a statement of elegance that shines as brightly as the northern lights themselves.',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'photos/item6.jpg'
        ]);
        Product::create([
            'name' => ' Celestial Splendor',
            'small_description' => 'Adorn Your Wrist with Stellar Beauty.',
            'large_description' => '"Celestial Splendor" evokes the beauty and grandeur of the cosmos, a reminder that the stars above are as endless as the possibilities below. The name reflects a watch that is both awe-inspiring and timeless—something that connects its wearer to the grandeur of the universe. The stainless steel case gleams with polished perfection, capturing light like the stars captured in the heavens. The dial, adorned with minute markers that resemble constellations, allows the wearer to trace the path of time just as one would trace the stars in the night sky. Each detail is meticulously designed, from the refined silver hands to the smooth sapphire crystal that offers clarity that rivals the finest telescopic lenses. "Celestial Splendor" is a watch for those who seek to carry a piece of the universe on their wrist—those who know that their place in the world is defined by the same brilliance that fills the heavens.',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'photos/item3.jpg'
        ]);

        Product::create([
            'name' => ' Royal Regalia',
            'small_description' => ' Reign in Regal Splendor with Every Second.',
            'large_description' => '"Royal Regalia" is an embodiment of majesty—a timepiece that reflects the nobility of kings and queens, the regal splendor that has shaped history for centuries. The name itself evokes images of crowns and thrones, where every moment counts and every second is precious. The gold-plated case gleams with opulence, while the watch’s intricate dial, adorned with royal engravings, speaks to the artistry and craftsmanship of a bygone era. The luxurious leather strap, designed for both comfort and style, wraps around the wrist like a royal cuff, and the sapphire crystal ensures that the watch remains as resilient as it is beautiful. "Royal Regalia" is for the wearer who demands only the finest—a timepiece that speaks to their elevated taste and reverence for timeless luxury. It’s not just a watch; it’s an heirloom, destined to be passed down for generations.',
            'price' => 3200.00,
            'quantity' => 5,
            'image' => 'photos/item5Home.jpg'
        ]);
        Product::create([
            'name' => ' Midnight Majesty',
            'small_description' => 'Unveil the Majesty of Midnight.',
            'large_description' => '"Midnight Majesty" is an ode to the darkness of the night, when the world is still and the air is thick with mystery. Its name evokes the quiet power of midnight, the hour when everything seems possible and the night holds its breath. The watch’s deep black ceramic case recalls the infinite depth of the night sky, while the dial, with silver accents, glows like the stars against the dark canvas of the night. Luminous hands gently track the passage of time, allowing the wearer to navigate through the night with effortless grace. The premium leather strap is both refined and durable, ensuring that the wearer’s elegance remains intact even in the darkest hours. "Midnight Majesty" is a watch for those who embrace the night—those who know that true luxury is not about the light of day, but the majesty of what lies hidden in the darkness.',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'photos/item6Home.jpg'
        ]);

        Product::create([
            'name' => 'Imperium Royal',
            'small_description' => 'Masterpiece of Timeless Luxury.',
            'large_description' => '"Imperium Royal" is the embodiment of royal authority, power, and elegance. Its name, derived from the Latin "imperium" meaning power or command, speaks to a timepiece that is as commanding as it is luxurious. The polished 18k gold case, combined with the intricate detailing on the dial, gives the watch an imperial presence, as if it were crafted for a ruler. The Roman numerals on the dial evoke a sense of history, while the smooth leather strap ensures that the wearer remains comfortable while exuding sophistication. The sapphire crystal, strong and clear, ensures that the watch remains as resilient as it is beautiful. "Imperium Royal" is not just a watch, but a symbol of the wearer’s status—an expression of timeless power and regality.',
            'price' => 3200.00,
            'quantity' => 5,
            'image' => 'photos/item7Home.jpg'
        ]);
        Product::create([
            'name' => 'Velaris Grandeur',
            'small_description' => 'Sculpted for Ultimate Prestige.',
            'large_description' => '"Velaris Grandeur" is the pinnacle of sophistication and luxury. The name, inspired by the Latin word for "veil," symbolizes the elegance that is both subtle and powerful. The grandeur of this timepiece is reflected in its meticulous design—every detail is an homage to the finest craftsmanship. The polished stainless steel case, the gleaming dial, and the exquisite mother-of-pearl finish all combine to create a watch that exudes prestige. The elegant leather strap is designed for comfort, ensuring that this timepiece fits seamlessly into the lifestyle of the modern connoisseur. "Velaris Grandeur" is for the wearer who knows that true luxury is not about ostentation, but about quiet, enduring excellence. It’s a watch that carries the wearer through the most prestigious of events, leaving a lasting impression wherever they go.',
            'price' => 3200.00,
            'quantity' => 5,
            'image' => 'photos/item8.jpg'
        ]);
    }
}
