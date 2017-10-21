<?php

use App\Models\Post;
use App\Repositories\Contracts\IPostRepo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    private $model;
    private $_postRepo;

    /**
     * PostTableSeeder constructor.
     * @param IPostRepo $_postRepo
     * @param Post $model
     */
    public function __construct(IPostRepo $_postRepo, Post $model)
    {
        $this->_postRepo = $_postRepo;
        $this->model = $model;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $this->model->truncate();
        DB::table('hash_tag_post')->truncate();

        $posts = array(

            [
                'id' => 1,
                'post_title' => 'The Diversity of Addo Elephant Park',
                'post_description' =>  'Just a short drive from Port Elizabeth in the Eastern Cape, Addo Elephant Park is the third largest game reserve in South Africa, and is among the most diverse, in terms of wildlife, of any of the country’s national parks.
                                        Biodiversity at Addo Elephant Park
                                        Addo is particularly known for its dense population of elephants, but these majestic beasts are not all the park has to offer visitors interested in seeing the wildlife of the Eastern Cape.
                                        Following a recent expansion, the park now includes a nearby marine reserve and houses five of the seven major biomes in South Africa, making Addo a unique habitat for a plethora of land and marine species, unrivaled in diversity by any other park in the world.
                                        Many of the plant species found in its borders aren’t found anywhere else on the planet, its biodiversity rivals even the succulent species biome of the Karoo and the unique fynbos biome of the Western Cape.
                                        A biome refers to a large community of plants (or animals) that occur distinctly in a particular region and with Addo having five of South Africa’s seven biomes within its borders, any visitor to the park is sure to be impressed by the over 500 flora species on display.
                                        
                                        Flora and Fauna at Addo Elephant Park
                                        
                                        Regarding fauna, Addo is home to a healthy population of terrestrial species, of which elephants are one, as is suggested by the park’s name. The massive herds are free to roam the 1,640km of the park and are visible throughout.
                                        In addition to the nearly 700 elephants who roam the park, Addo houses the other members of the Big Five, namely lion, leopard, buffalo and rhinoceros.
                                        Other animals that contribute to the park’s diversity are the hyena, buffalo, wildebeest, zebra, and warthog, as well as scores of the various antelope species.
                                        The expansion to include the marine reserve means Addo offers the opportunity to see both whales and great white sharks as well, making it the only place in the world where visitors are able to see the ‘Big Seven’ in their natural habitat.
                                        Following that expansion, the park has also come to include two large islands, St Croix and Bird Island. The former is home to a colony of African penguins, while the latter is home to a considerable number of sea bird species, particularly gannets.
                                        
                                        Where to Stay
                                        
                                        Addo Elephant Park’s accommodation is also highly renowned. There are a number of guesthouses in and around the park that cater to locals and tourists alike. Find several options for accommodations and a guide to the Garden Route here.',
                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 1,
                'status' => 1,
                'user_id' => 1,
                'contant_id' => 2,
                'country_id' => 44,
                'state_id' => 215,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 2,
                'post_title' => 'Time Lapse Compilation: An Ode to Chicago',
                'post_description' => 'This video is a timelapse compilation of Chicago and its suburbs photographed over last six months.
                                        
                                        It contains different time lapses taken in the city and surrounding towns and was captured in ULTRA HD.
                                        
                                        I ve shot about 30,000 pictures for this project and used only 27 sequences in final editing.' ,
                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 0,
                'status' => 1,
                'user_id' => 1,
                'contant_id' => 4,
                'country_id' => 99,
                'state_id' => 263,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 3,
                'post_title' => 'Take a Stroll Along Regent’s Canal in London',
                'post_description' => 'London has a number of well known waterways and canals, which make them ideal places to take a walking tour of the city. There is a lot to see along the way, featuring plenty of attractions and landmarks, which makes it an enjoyable experience.
                                        The best area to stay if contemplating such a trip is the Bayswater Road area near Hyde Park or Central London, where you are always going to be in close proximity of many of its wonderful waterways and canals.  
                                        One of the better known canals of the city is Regent’s Canal. It offers a tranquil waterway, and along its route passes a zoo, parks, Victorian warehouses and Camden Market among other attractions.
                                        
                                        Regent’s Canal was constructed to join Grand Junction Canals Paddington section with the Thames River. It now has become a popular area with visitors and Londoners alike to hang out and spend their leisure time.
                                        
                                         
                                        
                                        The History of Regents Canal
                                        
                                        The Regents Canal Company was formed in 1812. They were allotted the task of building a new canal from the Grand Junction Canals Paddington area to Limehouse.
                                        
                                        It was planned to construct a dock which would be located at the junction of the Thames River. Its architect was the well known British architect John Nash who came up with the idea of having barges ply the waterways through the urban landscape. It was completed in 1820, but was built at a time close to the start of the railways era, which did not make it a very financially viable project at the time. In fact it narrowly missed being demolished and used for the railways. However, later on it became an integral part of transportation in the city.
                                        
                                        Some of the interesting things to do and attractions to visit on its route are:
                                        
                                         
                                        
                                        Kayaking and Narrow-boat Tours
                                        
                                        You could choose to hop aboard a narrow-boat and take a trip along the canal. There are narrow-boat tours available that take visitors from Little Venice to Camden Lock Market, which makes for a thrilling and colorful trip along the route. Going on a one-way trip would take a little under an hour to complete. On the way visitors get to learn about the history of narrow-boats, the cargo they carried and life on the waterways. You can hop off at the fascinating London Canal Museum which is housed in a Victorian era ice house, where you also get to learn about the history of ice-cream and the ice-trade. Alternately you could choose to take a kayak tour of the Canal which is offered by London Kayak Tours. It is a guided tour and kayakers get to paddle 8 miles over the length of the canal.
                                        
                                         
                                        
                                        Little Venice & the Marylebone Cricket Club
                                        
                                        One of the most picturesque parts to visit is Little Venice, also called Maida Vale, which is a serene spot that has a number of waterfront bars, restaurants, independent shops and the famous Canal Cafe besides the Puppet Barge. Move further along the canal route and you will arrive at the Mecca of Cricket the legendary Lords Cricket Ground. You could learn about the game’s history at the MCC (Marylebone Cricket Club) and also take a tour of Lords Ground and its museum.
                                        
                                         
                                        
                                        Regents Park and the London Zoo
                                        
                                        Regent’s Park was transformed by John Nash in 1811, from being a former hunting reserve of Henry VIII to the magnificent landscaped gardens that are seen today. Regent’s Park houses a number of playing fields, lakes and incredibly beautiful rose gardens. Regent’s Park is referred to as the jewel in the crown of London and has been a popular movie location for many movies shot in London. These include an American Werewolf in London, Bridget Jones: The Edge of Reason, Withnail and I and About a Boy among other well known movies.
                                        
                                        Once twilight moves in you will see the lights twinkle in the area. The Open Air Theatre in Regents Park is one of the best theatre venues in the city. You can visit it in the summer when it is open for visitors and is a popular attraction for both residents of London as well as tourists..
                                        
                                        If you are in the Regent Park area, you must pay a visit to the ZSL London Zoo. Here you will come across more than 750 exotic species of animals, which include giraffes, camels, tigers, pythons and the fearsome pre-historic looking Komodo dragon! A great place to visit with the family.
                                                                               
                                        
                                        Primrose Hill
                                        
                                        One of the trendiest places in town Primrose Hill is known to be the haunt of celebrities including movie actors and rock stars. It offers a wonderful shopping opportunity although you will need to pack a fat wallet, as it is home to exclusive boutiques, gastro pubs and restaurants in the area. Here you will also find organic product retailers, specialist lingerie outlets, quaint bookshops and a number of high-end perfume outlets among other expensive shopping retailers. Pop in at the Lemonia, which is a famous Greek eating joint where you can enjoy a wonderful meal out in the open, while you can keep your eyes open for celebrity spotting.
                                        
                                         
                                        
                                        Camden Market
                                        
                                        Travel along to Camden Market and you will probably get the enticing aroma of food or hear music, before you actually catch a sight of the many stalls to be found in the area.  Weekends are the busiest time when the area is awash with visitors who drop-in on the lookout for artsy stuff including accessories, clothes, getting a tattoo or even going in for body piercing. Don’t despair as it is not just for the young bunch, as it offers a good choice of furniture, antiques, pottery and additional paraphernalia to choose from.' ,
                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 1,
                'status' => 1,
                'user_id' => 1,
                'contant_id' => 3,
                'country_id' => 159,
                'state_id' => 336,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 4,
                'post_title' => 'FREE Kerala Travel Guide',
                'post_description' => 'The South Indian state of Kerala is well known by its tagline, God s Own Country. It is an enchanting tourist destination - a travelers paradise in every sense.
                                        Kerala has much to offer - warm sandy beaches, lush green forests, tranquil backwaters, crispy cool hilltops and a rich cultural heritage
                                        To help you experience this exotic paradise, we ve published a free travel guide that provides a gist of everything you can do on your trip to Kerala. The eBook outlines the major tourist destinations in Kerala, along with real photographs and essential information to guide your trip.' ,
                'ebook_title' => 'FREE Kerala Travel Guide',
                'ebook_link' => 'https://www.ixigo.com/kerala-travel-guide-pdf-1273352.pdf',
                'is_featured' => 1,
                'status' => 1,
                'user_id' => 2,
                'contant_id' => 6,
                'country_id' => 25,
                'state_id' => 303,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 5,
                'post_title' => 'Four Not to Miss Destinations in Pakistan',
                'post_description' => 'Pakistan is a country where you can find all four seasons, which is really rare in the world. Like the variety of seasons, this country showcases extreme variants of landscape as well.
                                        Like in the north, there are majestic mountain peaks and mountain ranges and in the south there is a coastline. There are also fertile plateaus and some of the largest deserts in the world. Visiting Pakistan is extremely easy due to its flexible visa policies and the availability of cheap in-bound flights.
                                        Pakistan offers a number of tourist attractions but there are a few that you should definitely not miss while visiting this country.
                                        
                                         
                                        
                                        Must-visit Attractions in Pakistan
                                        
                                        Watch Polo at the World’s Highest Polo Playing Ground – Shandur
                                        This polo ground is situated at an altitude of 12,200 feet, thats the reason it is also sometimes referred as Roof of the World. This polo ground has been designed by nature and is surrounded by small hills and a lake.
                                        Shandur Festival takes place annually at Shandur Polo Ground, between 7 and 9 July. Each year thousands of foreign and local visitors come to attend this festival. A tent village is set up to accommodate all of these visitors. During your stay, you will enjoy folk dance and music. Teams from Gilgit and Chitral areas of Pakistan participate in this polo festival.
                                        
                                         
                                        Explore the Scenic Northern Areas of Pakistan
                                        Who can forget to tour the northern areas of Pakistan? These areas present natural beauty in its purest form and are unaltered by humans. These areas are world renowned for some of the highest peaks of the world, lush green vast valleys, mighty rivers, amazingly beautiful lakes and number of national parks.
                                        The highlights of this area include Neelum Valley, Hunza Valley, Kaghan Valley and Saif ul Muluk Lake.
                                        
                                        
                                        City of Gardens and 12 Doors – Lahore
                                        
                                        This historic city of Pakistan is famous for its Moghul architecture and spicy foods. To fully experience the rich culture and embrace yourself into this vibrant city, you should allocate about a week to tour the city.
                                        Lahore is also called City of Gardens due to its aesthetic gardens. Some of these gardens are made by Moghul rulers. Lahore always remained under attack from the foreign invaders and Moghul rulers fortified this city with thick walls and formidable gates. Twelve of these historic gates are still in good condition and give you a glimpse of old times.
                                        Other than gardens and doors, there are plenty of other places as well like The Badshahi Mosque, Minar e Pakistan, Lahore Fort, Lahore Museum and Wagha Border.
                                        
                                        
                                        
                                        Visit the Cradle of Buddhism and Gandhara Civilization - Taxila   
                                        
                                        If you want to include more historical sites of Pakistan in your itinerary, then you should visit Taxila. This ancient city has a rich history of more than 3,000 years and is the founding place of Buddhist religion. According to UNESCO, Taxila ruins are one of the most important archeological sites of Asia.
                                        Here, you will find Bihr Mound, Saraikala, Sirkap, Bhir and Sirsukh. The excavated coins, tools and sculptures are placed at the Taxila museum.
                                        
                                        
                                        Pakistan should be on your travel list if you have limited budget and want to see natural and historical places at the same time. You can find cheap flights to Pakistan around the year, so its always a great idea to visit this scenic country.' ,
                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 0,
                'status' => 1,
                'user_id' => 3,
                'contant_id' => 2,
                'country_id' => 44,
                'state_id' => 215,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 6,
                'post_title' => '5 Budget Tips for Travel in Europe',
                'post_description' => 'Whether you’re a student on a budget, a family with children, or a travel aficionado, spending a summer abroad in Europe can easily create a large dent in your finances.
                                        
                                        However, with a little bit of planning and the use of alternative travel methods, making your way around Europe does not have to necessarily break the bank.
                                        
                                        Let’s look at five major ways to save money when traveling through Europe.' ,
                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 0,
                'status' => 1,
                'user_id' => 4,
                'contant_id' => 3,
                'country_id' => 159,
                'state_id' => 336,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 7,
                'post_title' => 'Best Things To Do In Dar Es Salaam',
                'post_description' => 'The commercial hub of Tanzania, Dar es Salaam, has grown from a humble fishing village in the 1900’s into one of Africa’s largest and most notable cities.
                                       The city offers a range of attractions to the curious traveller and is not to be missed by visitors to the Great Lakes region.
                                       Here are five of Dar es Salaam’s main attractions:

                                        National Museum
                                        The National Museum displays the most noteworthy parts of Tanzanian culture and offers visitors a glimpse into the nation’s past with relics from the colonial era and slave trade as well as the history of tribal rule in the country.
                                        Opened as a tribute to King George V in 1940, the museum also displays some of the earliest fossils of human ancestors excavated during renowned archaeologist Louis Leakey’s expedition to the Olduvai Gorge in the 1930s.
                                        Close to the Tazara Railway Line, the museum is a favourite amongst those on luxury train journeys, particularly those coming from South Africa.

                                        Oyster Bay
                                        Home to a large expatriate community, Oyster Bay (also known as Coco Bay) is one of the most popular areas amongst tourists for its stunning main beach and has been home to European settlers since colonial times.
                                        Oyster Bay is one of the more affluent suburbs of the city where both tourists and locals come together to enjoy the vibrant nightlife, street food and live local music.
                                    
                                        Bongoyo Island
                                        yo Island is situated four miles off the Msasani Peninsula. With stunning white beaches and a number of popular restaurants on the northwestern tip of the island, it’s the perfect destination for a day away from the hustle and bustle of the city centre.',

                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 1,
                'status' => 1,
                'user_id' => 4,
                'contant_id' => 2,
                'country_id' => 113,
                'state_id' => 326,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 8,
                'post_title' => 'Best Things To Do In Dar Es Salaam',
                'post_description' => 'Here’s a list of things to do while you are in Dar es Salaam:

                                        National Museum and House of Culture
                                        First opened to the public in 1940, the National Museum and House of Culture takes you on a tour of Tanzania’s remarkable past. It exhibits fossils of early human ancestors, showcases the country’s tribal heritage, and offers you an intimate look at traditional customs, crafts, and ornaments.
                                        The comprehensive display also covers how the slave trade and German colonial periods affected Tanzania.',

                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 1,
                'status' => 1,
                'user_id' => 4,
                'contant_id' => 3,
                'country_id' => 159,
                'state_id' => 338,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 9,
                'post_title' => '5 Of The Most Charming Day Trips From Amsterdam',
                'post_description' => 'Mbudya Island

                                        Situated on the northern side of Dar Es Salaam, Mbudya Island is a gorgeous, 
                                        hidden beach paradise. Given its perfect combination of white sand and turquoise 
                                        waters, it’s worth visiting for a swim or a snorkel. Stick around for a meal of
                                         fresh barbecued seafood too. 
                                                                                
                                        Askari Monument
                                       
                                        The Askari monument is a bronze-cast statue depicting an Askari (soldier) in a World War One 
                                        uniform. It is supposedly situated in the middle of the the city, and commemorates the 
                                        African troops who fought as carrier corps during the war. When you visit, don’t forget 
                                        to look at the English and Swahili inscription on the monument, penned by the famous British 
                                        writer, Rudyard Kipling.',
                'ebook_title' => 'A Dogs Tale',
                'ebook_link' => 'http://publicliterature.org/pdf/3174.pdf',
                'is_featured' => 0,
                'status' => 1,
                'user_id' => 3,
                'contant_id' => 6,
                'country_id' => 25,
                'state_id' => 291,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => 10,
                'post_title' => 'Lahore Se Aagey 2016 | Saba Qamar | Yasir Hussain | Pakistani Full HD Movie',
                'post_description' => 'Moti journeys from Lahore to the northern areas of Pakistan where he meets a female rock star.
                                        Lahore Se Aagey is a Pakistani road-comedy film directed by Wajahat Rauf, Produced by Muhammad Arslan Ashraf and written by Yasir Hussain. It is sequel to 2015 comedy film Karachi Se Lahore, and it released on November 11, 2016 under the production banner of AN Entertainment Pvt. Ltd 
                                        
                                        Cast:
                                        Yasir Hussain as Mutazalzal a.k.a. Moti
                                        Saba Qamar as Taraa Ahmed
                                        Mubashir Malik as Ali
                                        Rubina Ashraf as Farah
                                        Behroze Sabzwari as Mamu
                                        Abdullah Farhatullah
                                        Noor ul Hassan as Balla
                                        Omer Sultan
                                        Atiqa Odho
                                        Aashir Wajahat as Zeezo
                                        Asad Siddiqui as a Pan seller (cameo appearance)
                                        Ali Zafar as himself (special appearance)
                                        Shiraz Uppal as Judge (special appearance)
                                        Komal Rizvi as Judge (special appearance)
                                        Goher Mumtaz as Judge (special appearance)
                                        Iftikhar Thakur as a hair dresser (special appearance)',
                'ebook_title' => '',
                'ebook_link' => '',
                'is_featured' => 0,
                'status' => 1,
                'user_id' => 2,
                'contant_id' => 4,
                'country_id' => 113,
                'state_id' => 327,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],


        );





        $this->model->insert($posts);

        $post = $this->_postRepo->find(1);
        $post->categories()->sync( [
            0 => "44",
            1 => "2",
        ]);
        $post->hashTags()->sync( [
            0 => "1",
            1 => "2",
            2 => "3"
        ]);

        $post = $this->_postRepo->find(2);
        $post->categories()->sync( [
            0 => "99",
            1 => "4",
        ]);
        $post->hashTags()->sync( [
            0 => "5",
            1 => "7",
            2 => "9"
        ]);

        $post = $this->_postRepo->find(3);
        $post->categories()->sync( [
            0 => "159",
            1 => "3",
        ]);
        $post->hashTags()->sync( [
            0 => "10",
            1 => "12",
            2 => "6"
        ]);

        $post = $this->_postRepo->find(4);
        $post->categories()->sync( [
            0 => "25",
            1 => "6",
        ]);
        $post->hashTags()->sync( [
            0 => "3",
            1 => "9",
            2 => "15",
            3 => "5"
        ]);

        $post = $this->_postRepo->find(5);
        $post->categories()->sync( [
            0 => "44",
            1 => "2",
        ]);
        $post->hashTags()->sync( [
            0 => "8",
            1 => "2"
        ]);

        $post = $this->_postRepo->find(6);
        $post->categories()->sync( [
            0 => "159",
            1 => "3",
        ]);
        $post->hashTags()->sync( [
            0 => "1",
            1 => "7",
            2 => "10"
        ]);

        $post = $this->_postRepo->find(7);
        $post->categories()->sync( [
            0 => "113",
            1 => "2",
        ]);
        $post->hashTags()->sync( [
            0 => "3",
            1 => "8",
            2 => "10"
        ]);

        $post = $this->_postRepo->find(8);
        $post->categories()->sync( [
            0 => "159",
            1 => "3",
        ]);
        $post->hashTags()->sync( [
            0 => "6",
            1 => "4",
        ]);

        $post = $this->_postRepo->find(9);
        $post->categories()->sync( [
            0 => "25",
            1 => "6",
        ]);
        $post->hashTags()->sync( [
            0 => "1",
            1 => "3",
        ]);

        $post = $this->_postRepo->find(10);
        $post->categories()->sync( [
            0 => "113",
            1 => "4",
        ]);
        $post->hashTags()->sync( [
            0 => "5",
            1 => "8",
        ]);
    }
}
