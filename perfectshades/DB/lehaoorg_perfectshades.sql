-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 09:15 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lehaoorg_perfectshades`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Aviator'),
(2, 'Wayfarer'),
(3, 'Round'),
(4, 'Rectangular'),
(5, 'Square'),
(6, 'Predator'),
(7, 'Cat Eye'),
(8, 'Other'),
(9, 'Buckle Temple'),
(10, 'Oval'),
(11, 'Butterfly'),
(12, 'Holbrook');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(8) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `description`) VALUES
(1, 'Gold'),
(2, 'Black'),
(3, 'Brown'),
(4, 'Silver'),
(5, 'Grey'),
(6, 'Light Havana'),
(7, 'Gunmetal'),
(8, 'Tortoise-shell'),
(9, 'Pink'),
(10, 'Navy'),
(11, 'Ivory'),
(12, 'Pink'),
(13, 'Red'),
(14, 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(8) NOT NULL,
  `glasses_id` int(8) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment_text` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `face_pairings`
--

CREATE TABLE `face_pairings` (
  `category_id` int(3) NOT NULL,
  `face_shape_id` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Face pairings e.g. aviators go with round or oval faces';

--
-- Dumping data for table `face_pairings`
--

INSERT INTO `face_pairings` (`category_id`, `face_shape_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(6, 1),
(6, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `face_shapes`
--

CREATE TABLE `face_shapes` (
  `id` int(3) NOT NULL,
  `shape` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='e.g. id = 2, shape = ''ROUND'' ';

--
-- Dumping data for table `face_shapes`
--

INSERT INTO `face_shapes` (`id`, `shape`) VALUES
(4, 'Heart'),
(2, 'Oval'),
(1, 'Round'),
(3, 'Square');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_products`
--

CREATE TABLE `favourite_products` (
  `user_id` int(8) NOT NULL,
  `glasses_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='used to store user''s favourite items from the catalog';

-- --------------------------------------------------------

--
-- Table structure for table `glasses`
--

CREATE TABLE `glasses` (
  `id` int(8) NOT NULL,
  `category_id` int(3) NOT NULL DEFAULT '8',
  `manufacturer_id` int(20) NOT NULL,
  `model_number` varchar(30) NOT NULL,
  `color_id` int(8) NOT NULL,
  `gender` enum('Men','Women','Unisex') NOT NULL DEFAULT 'Unisex',
  `description` text NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='may need columns for color, brand, manufacturer''s product code';

--
-- Dumping data for table `glasses`
--

INSERT INTO `glasses` (`id`, `category_id`, `manufacturer_id`, `model_number`, `color_id`, `gender`, `description`, `price`) VALUES
(1, 1, 1, 'ORB3025', 1, 'Men', 'Every model in the Ray-Ban collection is the product of meticulous, original styling that translates the best of the latest fashion trends into an ever-contemporary look for millions of Ray-Ban wearers around the world. Ray-Ban sizes refer to the width of one lens in millimeters. Ray-Ban products sold by authorized sellers, like Amazon.com, are eligible for all manufacturer warranties and guarantees. Ray-Ban products include an etched "RB" on the left lens. The RB is not a scratch or defect. The shape and curvature of these sunglasses may need adjustments. Adjustments should only be made by a professional. Made in Italy or China. ', 171.43),
(2, 2, 1, 'RB2132', 2, 'Men', 'The Ray-Ban RB2132 622 55  New Wayfarer Sunglasses Matte Black is the younger, smaller sibling of the original Ray Ban Wayfarer but  by no means does it play second string.\r\nAn effortlessly cool design,  these Ray Ban  sunglasses come with a matte black frame and arms adorned with the Ray-Ban logo along.  Complimented by 55mm crystals green lens, these Ray Ban New Wayfarers are engineered to filter out glare and provide maximum UV protection. Presented in an authentic Ray Ban sunglasses case, these  Ray-Ban sunglasses needs no introduction considering that Ray Ban was founded in 1937 and has remained the market leader ever since. Endorsed by almost every celebrity on the planet,  Ray-Ban sunglasses are the ultimate wardrobe essential.', 113.56),
(3, 2, 1, '0RB3016M', 3, 'Men', 'For the first time ever the clubmaster, an absolute icon of the Ray-Ban collection, is offered to you in precious wood versions, for an exclusive, contemporary look. This 0rb3016m is available in three different kinds of wood: walnut, maple and cherry combined with differently colored rubber insides. The wooden frames are treated and then lined for maximum comfort, ensuring the glasses are flexible and durable.', 89),
(4, 3, 1, 'ORB3447', 4, 'Men', 'Round Ray-Ban sunglasses draw inspiration from decades of style icons. Mirrored lenses, crystal arm ends, and matte finished frames. Carrying case and cleaning cloth included.', 129.14),
(5, 4, 1, '0RB3136', 1, 'Men', 'Originally launched in 1957, ray-ban caravan sunglasses are a streamlined, geometric 0rb3136 and an alternative to the classic aviator sunglasses . The ray-ban signature logo is displayed on the nose pads and lenses. The caravan features square sunglasses lenses and frames, as opposed to the teardrop lens shape sunglasses seen in the aviator.', 159),
(6, 4, 1, '0RB4165', 5, 'Men', 'Ray-Ban is the world\'s most iconic eyewear brand and is a global leader in its sector. Every model in the Ray-Ban collection is the product of meticulous, original styling that translates the best of the latest fashion trends into an ever-contemporary look for millions of Ray-Ban wearers around the world. From the early Aviator style that emerged in 1937 to the introduction of the classic Wayfarer in 1952, Ray-Ban is a brand that embodies America and adventure, great cities and wide-open spaces, heroism, individuality, and authenticity. Starting with a silver screen debut in 1961, Ray-Ban sunglasses have appeared throughout hundreds of films and have been a favorite on the Hollywood scene for years, both on and off the screen. With timeless and imaginative styles, Ray-Ban consistently blends high-tech design, lenses, and materials.  The collection remains true to its classic heritage while continuously evolving to meet today\'s fashion demands.', 116.23),
(7, 5, 1, 'RB4147', 6, 'Men', 'Protect your eyes with these stylish RB4147 sunglasses by Ray Ban. These sunglasses are made of plastic, are 100% brand new and include the manufacturer\'s one-year warranty. Pick a frame and lens color combination that complements your wardrobe or go with a classic color choice - either way you\'ll look and feel great with these Ray Ban sunglasses.', 133.77),
(8, 2, 1, 'RB2140', 2, 'Men', 'Ray-Ban brings a modern twist to a classic style with fresh colors and lens tints. The Original Wayfarer offers options for everyone - whether you\'re a sneaker-collecting hipster, or you\'ve just been wearing these for 20+ years. Ray-Ban\'s legendary reputation for optical quality was built on these shades - there\'s a reason the Wayfarer is one of the most-copied sunglass designs of all time.', 175),
(9, 1, 1, '0RB3449', 7, 'Men', 'A unique take on the aviator classic, the rb3138 is a rimless aviator that creates a very clean, classic aviator look with thin metal temples.', 171.97),
(10, 6, 1, 'RB2027', 2, 'Unisex', 'Living large since the 90\'s, the Predator from Ray-Ban is a clean and simple style that holds the same iconic strength as every other style. It\'s casually cool, bold, and utterly versatile and will shape just about every shape of face. Ray-Ban is the world\'s most iconic eyewear brand and is a global leader in its sector. Every model in the Ray-Ban collection is the product of meticulous, original styling that translates the best of the latest fashion trends into an ever-contemporary look for millions of Ray-Ban wearers around the world. From the early Aviator style that emerged in 1937 to the introduction of the classic Wayfarer in 1952, Ray-Ban is a brand that embodies America and adventure, great cities and wide-open spaces, heroism, individuality, and authenticity. Starting with a silver screen debut in 1961, Ray-Ban sunglasses have appeared throughout hundreds of films and have been a favorite on the Hollywood scene for years, both on and off the screen. With timeless and imaginative styles, Ray-Ban consistently blends high-tech design, lenses, and materials. The collection remains true to its classic heritage while continuously evolving to meet today\'s fashion demands.', 133.16),
(11, 7, 2, 'PR01OSA', 2, 'Women', 'These Prada sunglasses will compliment any occasion or outing whether its for work or play Featuring light and never bulky cat eye style black plastic frames with practical yet stylish grey plastic lenses these sunglasses will keep your sights clear while looking good! Made in Italy.', 215.36),
(12, 2, 2, 'PS04OS', 5, 'Unisex', 'Prada was first established in 1913 as an Italian leather goods company but during the 1970s became a fashion power-house known for its’ innovative textile technology and bold catwalk designs. From this foundation, Prada Sport was born.\r\nThese Prada Sport PS 04OS 1BO1A1 59 Wayfarer Style Sunglasses in Demi Shiny Black take on the classic Wayfarer design with a unique athletic Prada twist. Crafted to emulate the traditional Wayfarer silhouette in versatile black, these Prada Sport sunglasses are equipped with red temple details and 59mm grey lenses. Presented with a silver hard-shell Prada Sport sunglasses case, these Prada Sport frames will remain stylish today, tomorrow and beyond.', 76.61),
(13, 1, 2, 'PR12QS', 8, 'Women', 'Its blazing hot out and you make it even hotter by burning up the scene with your scorching new shades Youre not imitating the latest fashion trend youre creating it for the very first time How does it feel to be the one who everyone else is copying Fantastic! You know youve got IT whatever the IT truly is at this given moment So how exactly did you jump so far-out ahead of the crowd to be the person that everyone else is imitating Easy Its a combination of your imagination your great sense of style your love of anything new the little interjections of wow and pizzazz in all the right places in your wardrobe and to top it all off the very latest in womens fashionable Prada sunglasses Prada sunglasses are the crowning touch to your clothing ensemble Their unique aviator frames most definitely stand out from the average run-of-the-mill type sunglasses frames and their highly fashionable tortoiseshell plastic frames are literally light-years ahead of any of the competition Top all of this off by the way in which their brown plastic lenses both complements the frames and simultaneously offset this pair of sunglasses from all the rest in the crowd and its no wonder that you look as good as you do! So now that you know whats stopping you from picking up your next fantastic pair Whether its out shopping at a party on the street on vacation or shooting back and forth across town to get all your assignments completed you will know for certain that people are watching you and your stylish ensemble of fashion that\'s always topped off with your new pair of Prada sunglasses Prada sunglasses made in Italy.', 276.05),
(14, 8, 2, 'PR22MS', 2, 'Women', 'Around town at your favorite place during your power lunch at the office showing off your leadership skill-sets and looking experienced in your clients eyes or knocking back in your favorite resort or club you look fantastic due not just to your impeccable style and the way you carry yourself but also to the fact that people cant resist trying to get a glimpse of those eyes that go with your style but are completely hidden from view by your Prada sunglasses Made in Italy.', 283.07),
(15, 7, 2, 'PR09QS', 9, 'Women', 'Matte finish.', NULL),
(16, 1, 3, 'GG2252S', 10, 'Men', 'Gucci Men\'s Aviator Sunglasses GG2252S', 129.03),
(17, 1, 3, 'GG4239S', 11, 'Women', 'Classic Gucci aviator sunglasses with an enameled top rim and gradient lenses. Sturdy resin arms. Case and cleaning cloth included.\r\n', 189.99),
(18, 1, 3, 'GG1091S', 2, 'Men', 'Gucci Sunglasses 1091 D28 N6 Shiny Black Grey Gradient are a flattened aviator style with the classic Gucci colour stripes on the temple along with the Gucci logo which also appears on the right lens. These are seriously cool and this kind of style always sells out from Gucci so grab them while you can!', 77.72),
(19, 1, 3, 'GG3720S', 12, 'Men', 'These Gucci Women\'s 3720/S Plastic Aviator Sunglasses are smart, fun and sexy. Beautiful authentic Gucci 3720/S 0HYB/VQ Violet / Black/Multilayer Pink Sunglasses made in Italy. Includes original case, cleaning cloth and authenticity card.\r\n', 240),
(20, 2, 3, 'GG1079S', 3, 'Unisex', 'Italian luxury fashion house Gucci have been one of the most prominent names the industry for almost nine decades and their new season collection still manages to surprise and innovate.This pair of Gucci GG 1079/S WR9 50 Chunky Square Sunglasses in Brown Havana have an elegant timeless feel that transcends all seasonal trends and fads. The chunky square Wayfarer style frame is classic in brown Havana with delicate silver accents and 50mm brown gradient lenses. The perfect finishing touch to any outfit, these versatile Gucci sunglasses reflect the brands\' quintessential European style by means of effortless chic , quality and detail.\r\n', 179.99),
(21, 9, 3, 'GG3712S', 2, 'Women', 'Gucci have glamour nailed with this pair of Gucci GG 3712/S D28 59 Buckle Temple Sunglasses in Shiny Black.Crafted in an oversized 1960s inspired round silhouette, these Gucci sunglasses ooze A-List chic and versatility with their polished black finish and 59mm gradient grey lenses. The real centre-piece of these stunning Gucci frames however is the opulent gold buckle temple which is intricate and expertly designed to give a luxurious high fashion touch. Presented with an authentic Gucci case, these Gucci sunglasses can be taken anywhere to add an instant boost of beauty to any wardrobe.\r\n', 83.1),
(22, 8, 3, 'GG3693S', 13, 'Women', 'Ladies Gucci sunglasses', 199.99),
(23, 10, 3, 'GG3697S', 2, 'Women', 'These Gucci Women\'s 3697/S Plastic Oval Sunglasses are smart, fun and sexy. Beautiful authentic Gucci 3697/S 0AM3/HD Shiny Black/Gray Gradient Sunglasses made in Italy. Includes original case, cleaning cloth and authenticity card.\r\n', 160),
(24, 10, 3, 'GG4253S', 12, 'Women', 'Combining superior design with a lightweight and comfortable ease these Gucci GG 4253/S 010/DW Sunglasses exhibit a palladium full rim double bridge pilot style frame. These stunning designer sunglasses are enhanced with their slender palladium arms transparent ear socks and pink multilayer lenses. Measuring 58-16-140mm this item is shipped with its own distinctive case lens cleaning cloth and manufacturer\'s tags.\r\n\r\n', 234),
(25, 4, 3, 'GG4266S', 1, 'Women', 'Luxe, lightweight Gucci sunglasses in intricately patterned, logo-adorned metal frames. Tonal mirrored lenses. Case and cleaning cloth included.\r\n', 275.6),
(26, 5, 3, 'GG1075S', 2, 'Men', 'Gucci have a long history in fashion and their latest season collection shows that the Italian fashion house is also attuned to the future of chic European style.This pair of Gucci GG 1075/S GVB 57 Sporty Square Sunglasses in Shiny & Matte Black have an innovative athletic feel which easily adapts into any wardrobe. The sleek square design is reminiscent of the traditional Wayfarer style shape with sporting accents such as red and green hinge detail and a gunmetal logo at the temple. Featured here in versatile polished black with 57mm gradient grey lenses, these Gucci sunglasses cement Gucci’s stature in the fashion world with their solid style heritage.\r\n', 246.39),
(27, 10, 3, 'GG2820S', 3, 'Women', 'These Gucci Women\'s 2820/F/S Metal Oval Modified Sunglasses are smart, fun and sexy. Beautiful authentic Gucci 2820/F/S 00UJ/CC Light Gold/Brown Gradient Sunglasses made in Italy. Includes original case, cleaning cloth and authenticity card.\r\n', 93.92),
(28, 11, 4, 'PO3019S', 2, 'Women', 'Any woman whos compassionate about fashion knows the value of accessories With the right ones they have the ability to both elevate a casual getup and accentuate an elegant ensemble Take this classy pair of Persol shades as a prime example Theyre the perfect archetype of a sunglasses that can be worn as an everyday accessory but make for an incredibly chic adornment at the same time Their glossy black plastic frames create a flawlessly sleek look and also make for a lightweight pair Their glass lenses are a cool tone of grey which contribute to the casual feel of these shades and also provide unhindered protection and crystal clear vision no matter what type of environment youre in They feature a stylish butterfly shape that is flattering on all faces so you can rest assured that these will look great on you If youre a woman with a killer fashion sense then these Persol sunglasses will be a perfect addition to your collection of top-notch accessories Made in Italy CARE These are your brand new shades and we want to make sure you know how to best care for them Make sure that when you are not wearing them you put them in their designated case that they come with To get the best vision its beneficial to clean them regularly using a cleaning cloth and lens solution Avoid using materials such as your shirt or a paper towel to clean them as this will only cause more scratching Be careful not to distort their shape which can be avoided by using both hands to remove them and not placing them on your head', 197.59),
(29, 3, 4, '0PO0714', 3, 'Unisex', 'Look cool and confident with these contemporary round sunglasses by Persol Sporting lightweight tortoiseshell plastic frames you will definitely be feeling comfortable while looking your best! With ultra-cool brown plastic lenses you will soon be singing the old tune the futures so bright I gotta wear shades!', 224.32),
(30, 4, 4, 'PO3048S', 3, 'Men', 'When it comes to accessories sunglasses are the absolute essential accessory to have They serve as a safeguard for your eyes from the suns harsh glare but they can be the perfect addition to your outfit as well if you choose them with a discerning eye This is most definitely an area of concern for you if you consider yourself a fashionable man and we wouldnt want you to have to sacrifice your swagger for quality protection Take a look at these sunglasses from Persol an immaculate example of a top-notch pair both in appearance and in design They feature a sleek rectangle shape that is fitting for any man with class The stylish brown plastic lenses provide a crisp and clear vision a crucial benefit for every situation The lenses are encased in smooth tortoiseshell plastic frames that are sure to impress everyone around you Its not hard to see why these are one of our go-to shades for the dapper gentleman So if youre looking to stand out from the rest of the crowd and to stay classy with your accessories then these Persol sunglasses are exactly what you need Wear them to work on a date out with your guys or at an elegant dinner party You will be the best dressed without a doubt Made in Italy Here are some things you should and should not do in caring for your new shades DO carry yourself confidently in these shades keep them in their provided case show them off because theyre worth it and be prepared to stop people in their tracks DONT throw them in a fit of anger forget them at home or anywhere for that matter wear them if you dont want to be noticed or take them dirt biking', 232.87),
(31, 10, 4, 'PO0714', 3, 'Men', 'Everyones got a different style From hipster to boho-chic to grungy to elegant theres an accessory for every kind of flair and these sweet shades by Persol fit the fun and casual category according to our book If youre a guy who likes to keep it relaxed but still tasteful then were sure you will love this pair Theyre the kind you can take with you no matter what type of situation or environment youre in whether on the job out with your boys causing mischief or meeting that new girl you met last week at your favorite coffee joint They feature a oval shape that always makes for a good look and their brown plastic lenses provide crystal clear vision and a swanky appearance The tortoiseshell frames are a hybrid of unique and refined and are made with solid plastic so you can be confident that they will endure No matter where you are these shades are fitting for the occasion Theyre fun and sharp in appearance and go perfect with a man with a laid-back swagger Get these Persol stunners if youre ready for a wardrobe upgrade that is sure to make you stand out! Made in Italy DO expect to get attention whenever youve got these shades on keep track of them keep them in their designated case flaunt them every chance you get wear them wherever you go know that youre going to get an unusual amount of attention and tell people where you got them DONT leave them at home forget that theyre in your back pocket get in a fist-fight while these are on your face go skinny-dipping in them or let your best friend borrow them (because he wont give them back)', 222.62),
(32, 4, 4, 'PO2803', 2, 'Men', 'When it comes to accessories sunglasses are the absolute essential accessory to have They serve as a safeguard for your eyes from the suns harsh glare but they can be the perfect addition to your outfit as well if you choose them with a discerning eye This is most definitely an area of concern for you if you consider yourself a fashionable man and we wouldnt want you to have to sacrifice your swagger for quality protection Take a look at these sunglasses from Persol an immaculate example of a top-notch pair both in appearance and in design They feature a sleek rectangle shape that is fitting for any man with class The stylish grey plastic lenses provide a crisp and clear vision a crucial benefit for every situation The lenses are encased in smooth black plastic frames that are sure to impress everyone around you Its not hard to see why these are one of our go-to shades for the dapper gentleman So if youre looking to stand out from the rest of the crowd and to stay classy with your accessories then these Persol sunglasses are exactly what you need Wear them to work on a date out with your guys or at an elegant dinner party You will be the best dressed without a doubt Made in Italy Here are some things you should and should not do in caring for your new shades DO carry yourself confidently in these shades keep them in their provided case show them off because theyre worth it and be prepared to stop people in their tracks DONT throw them in a fit of anger forget them at home or anywhere for that matter wear them if you dont want to be noticed or take them dirt biking', 216.7),
(33, 1, 4, 'PO0649', 2, 'Men', 'Around town at your favorite place during your power lunch at the office showing off your leadership skill-sets and looking experienced in your clients eyes or knocking back in your favorite resort or club you look fantastic due not just to your impeccable style and the way you carry yourself but also to the fact that people cant resist trying to get a glimpse of those eyes that go with your style but are completely hidden from view by your Persol sunglasses These Persol sunglasses are distinctive and set you apart from the rest Its not just the classic aviator shape theyve been carefully crafted into but also the perception from all around you that theyre the very best you can acquire Persol sunglasses set you apart with their black plastic frames that ensconce the vibrant green plastic lenses all engineered combined and assembled just right to make this pair of sunglasses seem to be yours and yours alone If your image needs upgraded so that you can play hardball with the big boys here is where you start There will be no more attempting to seem meaningful No more futile struggles to get your points across to your audience And definitely no more feeling like youre the lowest of the low and nothing more than a bottom-feeder Previous adversaries will magically melt away in wonder and astonishment at your sudden accomplishments and the kudos you will receive from your superiors will fast-track you up the companys corporate ladder! Make your power lunches more powerful the heart of your business day more meaningful and your leisure time much much more enjoyable with your Persol sunglasses Made in Italy', 242.43),
(34, 1, 4, 'PO9649S', 14, 'Men', 'When it comes to accessories sunglasses are the absolute essential accessory to have They serve as a safeguard for your eyes from the suns harsh glare but they can be the perfect addition to your outfit as well if you choose them with a discerning eye This is most definitely an area of concern for you if you consider yourself a fashionable man and we wouldnt want you to have to sacrifice your swagger for quality protection Take a look at these sunglasses from Persol an immaculate example of a top-notch pair both in appearance and in design They feature a sleek aviator shape that is fitting for any man with class The stylish blue glass lenses provide a crisp and clear vision a crucial benefit for every situation The lenses are encased in smooth tortoiseshell plastic frames that are sure to impress everyone around you Its not hard to see why these are one of our go-to shades for the dapper gentleman So if youre looking to stand out from the rest of the crowd and to stay classy with your accessories then these Persol sunglasses are exactly what you need Wear them to work on a date out with your guys or at an elegant dinner party You will be the best dressed without a doubt Made in Italy Here are some things you should and should not do in caring for your new shades DO carry yourself confidently in these shades keep them in their provided case show them off because theyre worth it and be prepared to stop people in their tracks DONT throw them in a fit of anger forget them at home or anywhere for that matter wear them if you dont want to be noticed or take them dirt biking', 148.88),
(35, 1, 5, 'OO9135-09', 2, 'Men', 'Rough and tough look being a sports focused brand, the Oakley sunglasses are given dynamic shapes and turns to match the requirement of all sports freak. From Half-jacket to Radar Pitch styles, buy Oakley sunglasses for the perfect look. High technology essential that the sunglasses are given the necessary polarized and UV technique and that\'s where Oakley sunglasses come in. Oakley comes with a unique technology of interchangeable lenses so that you get a new look whenever you desire. Superior fit and vision for this products have been bestowed with three point fit, which holds the sunglasses in their place and does not let it nudge. Choose from the awe-inspiring range of aviators, wayfarers, sports sunglasses and rectangle-shaped shades from Oakley. Oakley sunglasses are available for both men and women. Grab different styles of sunglasses from Oakley, and add zing to your outfits. ', 234),
(36, 5, 4, 'PO3048S', 2, 'Men', 'If youre an athlete then you know how crucial it is to have quality gear Mediocre equipment simply wont cut it The same thing goes for your athletic apparel Who says you have to sacrifice your fashion sense for prime sports attire has to be They can and should go hand in hand and these Persol sunglasses are proof that this is true These shades are strikingly bold in appearance with their black frames which are made out of high-quality and durable plastic that arent easily broken and provide protection for your face These Persol specs are so comfortable that you wont mind having them on for hours as you engage in different sporting events and activities Their cool grey lenses are also made out of tough plastic and offer crystal clear vision and protection from dangerous the suns dangerous rays Their square shape contribute the sleek and daring look thats sure to boost your confidence in the game and intimidate your competitors So no matter what your sport is these Persol sunglasses are for the man whos both committed to athletics and style Made in Italy Here are some things you should and should not do in caring for your new shades DO wear them outside of just your sporting events prepare to dominate in them and expect people to stop and stare at you (and probably you where you got them) know you look snazzy while wearing them keep them in their case DONT have a boxing match with your friend (or with a stranger) in them play catch with them go diving in the deep blue in them throw them when you get angry or loan them to anyone if you want to stay slick', 231.53),
(37, 5, 4, 'PO3059S', 3, 'Men', 'Everyones got a different style From hipster to boho-chic to grungy to elegant theres an accessory for every kind of flair and these sweet shades by Persol fit the fun and casual category according to our book If youre a guy who likes to keep it relaxed but still tasteful then were sure you will love this pair Theyre the kind you can take with you no matter what type of situation or environment youre in whether on the job out with your boys causing mischief or meeting that new girl you met last week at your favorite coffee joint They feature a square shape that always makes for a good look and their blue plastic lenses provide crystal clear vision and a swanky appearance The brown frames are a hybrid of unique and refined and are made with solid plastic so you can be confident that they will endure No matter where you are these shades are fitting for the occasion Theyre fun and sharp in appearance and go perfect with a man with a laid-back swagger Get these Persol stunners if youre ready for a wardrobe upgrade that is sure to make you stand out! Made in Italy DO expect to get attention whenever youve got these shades on keep track of them keep them in their designated case flaunt them every chance you get wear them wherever you go know that youre going to get an unusual amount of attention and tell people where you got them DONT leave them at home forget that theyre in your back pocket get in a fist-fight while these are on your face go skinny-dipping in them or let your best friend borrow them (because he wont give them back) ', 246.39),
(38, 1, 5, 'OO4086-02', 2, 'Men', 'When it comes to accessories sunglasses are the absolute essential accessory to have They serve as a safeguard for your eyes from the suns harsh glare but they can be the perfect addition to your outfit as well if you choose them with a discerning eye This is most definitely an area of concern for you if you consider yourself a fashionable man and we wouldn\'t want you to have to sacrifice your swagger for quality protection Take a look at these Tailpin sunglasses from Oakley an immaculate example of a top-notch pair both in appearance and in design They feature a sleek aviator shape that is fitting for any man with class The stylish purple plastic lenses provide a crisp and clear vision a crucial benefit for every situation The lenses are encased in smooth black plastic frames that are sure to impress everyone around you Its not hard to see why these are one of our go-to shades for the dapper gentleman So if you\'re looking to stand out from the rest of the crowd and to stay classy with your accessories then these Oakley Tailpin sunglasses are exactly what you need Wear them to work on a date out with your guys or at an elegant dinner party You will be the best dressed without a doubt Made in China Here are some things you should and should not do in caring for your new shades DO carry yourself confidently in these shades keep them in their provided case show them off because they\'re worth it and be prepared to stop people in their tracks DON\'T throw them in a fit of anger forget them at home or anywhere for that matter wear them if you don\'t want to be noticed or take them dirt biking ', 260),
(39, 10, 4, 'PO2931S', 2, 'Men', 'When it comes to accessories sunglasses are the absolute essential accessory to have They serve as a safeguard for your eyes from the suns harsh glare but they can be the perfect addition to your outfit as well if you choose them with a discerning eye This is most definitely an area of concern for you if you consider yourself a fashionable man and we wouldnt want you to have to sacrifice your swagger for quality protection Take a look at these sunglasses from Persol an immaculate example of a top-notch pair both in appearance and in design They feature a sleek oval shape that is fitting for any man with class The stylish grey plastic lenses provide a crisp and clear vision a crucial benefit for every situation The lenses are encased in smooth black plastic frames that are sure to impress everyone around you Its not hard to see why these are one of our go-to shades for the dapper gentleman So if youre looking to stand out from the rest of the crowd and to stay classy with your accessories then these Persol sunglasses are exactly what you need Wear them to work on a date out with your guys or at an elegant dinner party You will be the best dressed without a doubt Made in Italy Here are some things you should and should not do in caring for your new shades DO carry yourself confidently in these shades keep them in their provided case show them off because theyre worth it and be prepared to stop people in their tracks DONT throw them in a fit of anger forget them at home or anywhere for that matter wear them if you dont want to be noticed or take them dirt biking', 170.3),
(40, 1, 5, 'OO4079', 8, 'Women', 'The sky is the limit with Oakley feedback, the ultra-feminine classic teardrop shape for women everywhere, with a soft silhouette, a lightweight frame and a flattering double nose bridge style. For the first time, we blended the beauty of a c5-wire front with the warm tones of an acetate stem – making it the first wire frame sunglass that is truly designed for the active woman. Stellar eye coverage and a snug but comfy head wrap ensure you’re ready for takeoff every time you wear Oakley feedback. ', 195),
(41, 1, 5, 'OO4068-01', 4, 'Women', 'Throw the Oakley Given Sunglasses over your eyes when you need a little relief from the sun. These sunnies shield you from UV radiation while it\'s fly-boy style gives you a classic aviator feel. You get the sun protection you need to brave eye-stinging glare and sleek look you want. Plutonite lenses exceed ANSI 787. 1 for impact-resistance and block 100% of UVA, UVB, and UVC light Optional gradient lenses block the light from above while letting in more light in on the bottoms so you can see what you\'re doingC-5 alloy frames blend five different metals for a great combination of strength and low weight Lightweight frame design means these sunnies won\'t feel heavy or awkward on your face Unobtainium hydrophillic nose pads eliminate slipping ', 98.99),
(42, 4, 5, 'OO9263-10', 5, 'Men', 'Oakley Turbine reigns supreme in in designing eyewear for the outdoor enthusiast With a comfy grey plastic frames combined with blue plastic lens these shades keep your eyes protected from harmful UV rays as well as dirt and insects Look like someone who knows what they are doing outdoors by wearing these tough sunglasses Made in USA ', 235),
(43, 4, 5, 'OO9263-02', 3, 'Men', 'Modern technology meets classic design with these impressive Turbine Oakley sunglasses These glasses sport ultra-comfortable brown plastic frames which combine durability and usability for an unparalleled fit These glasses also incorporate crisp orange plastic lenses for a clear sharp view Made in USA ', 93.1),
(44, 4, 5, 'OO9188-10', 2, 'Men', 'Rough and tough look being a sports focused brand, the Oakley sunglasses are given dynamic shapes and turns to match the requirement of all sports freak. From Half-jacket to Radar Pitch styles, buy Oakley sunglasses for the perfect look. High technology essential that the sunglasses are given the necessary polarized and UV technique and that?s where Oakley sunglasses come in. Oakley comes with a unique technology of interchangeable lenses so that you get a new look whenever you desire. Superior fit and vision for this products have been bestowed with three point fit, which holds the sunglasses in their place and does not let it nudge. Choose from the awe-inspiring range of aviators, wayfarers, sports sunglasses and rectangle-shaped shades from Oakley. Oakley sunglasses are available for both men and women. Grab different styles of sunglasses from Oakley, and add zing to your outfits. ', 273),
(45, 2, 5, 'OO9262-11 ', 4, 'Men', 'Rough and tough look being a sports focused brand, the Oakley sunglasses are given dynamic shapes and turns to match the requirement of all sports freak. From Half-jacket to Radar Pitch styles, buy Oakley sunglasses for the perfect look. High technology essential that the sunglasses are given the necessary polarized and UV technique and that\'s where Oakley sunglasses come in. Oakley comes with a unique technology of interchangeable lenses so that you get a new look whenever you desire. Superior fit and vision for this products have been bestowed with three point fit, which holds the sunglasses in their place and does not let it nudge. Choose from the awe-inspiring range of aviators, wayfarers, sports sunglasses and rectangle-shaped shades from Oakley. Oakley sunglasses are available for both men and women. Grab different styles of sunglasses from Oakley, and add zing to your outfits. ', 234),
(46, 2, 5, 'OO9013-73 ', 5, 'Men', 'Three-Point Fit that holds lenses in precise optical alignment. Integrated hinge mechanism. Plutonite lenses that stop every wavelength of UVA/UVB/UVC and harmful blue light up to 400 nm. High Definition Optics (HDO) provides superior optical clarity and razor-sharp vision at every angle. Glare reduction and tuned light transmission of Iridium lens coating. Optimized peripheral vision with six-base lens curvature. Metal icon accents. Made in U.S.A. This product may have a manufacturer\'s warranty. Please visit the manufacturer\'s website or contact us at for full manufacturer warranty details. ', 39.14),
(47, 7, 5, '24-297', 2, 'Men', 'The Oakley Polarized Frogskins Sunglasses cut down some of the glare off your neon-green track jacket. Innocent bystanders, however, will have to fend for themselves. High Definition Optics maintains clarity at distances Oakley bonds the glare-protection technology at a molecular level so it won\'t wear off Hydrophobic technology on lenses repels water, sweat, and oil ', 172.7);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `website` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `website`) VALUES
(1, 'Ray-Ban', 'http://www.ray-ban.com/'),
(2, 'Prada', 'http://www.prada.com/en/CA/e-store/department/woman/sunglasses.html?cmp=ggl_mse_en_CN_e-comm_WR-CN-EN-Prada-(Brand)-Sunglasses-Exact&gclid=CjwKEAjwkJfABRDnhbPlx6WI4ncSJADMQqxdSGjtOWG4Cb2rpjrSSIAr85zS21JBAEort9EDE-h9WhoCACXw_wcB'),
(3, 'Gucci', 'https://www.gucci.com/ca/en/'),
(4, 'Persol', 'http://www.persol.com/canada'),
(5, 'Oakley', 'http://ca.oakley.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `face_shape_id` int(3) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin_privilege` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `face_shape_id`, `password`, `admin_privilege`) VALUES
(13, 'joe@test.com', 'Test Name', NULL, '$2y$10$ob/Uux2xOPh8qATXEc4iS.yejWzyMRVdDaCgOTjxLLTTAQLIrLubG', 0),
(14, 'cole.r.siegel@gmail.com', 'Cole', NULL, '$2y$10$cwMua3RtdY6PK.ctNm4IyewpXwE7o1YQMm277ftJy1zWPPFukwKm.', 0),
(15, 'cole@go.com', 'Cole', NULL, '$2y$10$.OwZh3F7ETOnElqVevf7GuL4a54kwJrU3SD4LP0925e9NMdjdFCSK', 0),
(16, 'contact@perfectshades.ca', 'Firstname Lastname', NULL, '$2y$10$BhsQiwZkFrTVrpKoz5/TCO1LqYMZEjhkVCob1EnivDiuJHzhPwgGy', 0),
(17, 'lynn.luo1104@gmail.com', 'lynn', NULL, '$2y$10$UGkJSkZx13yvI2091XeL5.Lf5lCS.QtARq2bGx.dV8dsTj2JdPfhC', 0),
(18, 'adkooned@gmail.com', 'Amandeep Kooner', NULL, '$2y$10$zR5Ue3.iSi8zldYIgdoBMe3QLTINjVmfQPH8V2KPP7s2qSEmj7VnW', 0),
(19, 'brent@nyznyk.com', 'Brent ', NULL, '$2y$10$BvRElduDul4q1F2rHQXqIen2Hp0kRneUItBN69PpwDeK/khk5aru6', 0),
(20, 'sampleuser@gmail.com', 'Sample User', NULL, '$2y$10$Az9kcR/QQlfbJopJWT307uvEPr2AiKMXaVCqfKv4JFwVLmS2sZcdO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_resources`
--

CREATE TABLE `web_resources` (
  `glasses_id` int(8) NOT NULL,
  `url` varchar(300) NOT NULL,
  `ASIN` varchar(20) DEFAULT NULL COMMENT 'Amazon Standard ID #'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Used for URL access for web scraping / APIs';

--
-- Dumping data for table `web_resources`
--

INSERT INTO `web_resources` (`glasses_id`, `url`, `ASIN`) VALUES
(1, 'https://www.amazon.ca/Ray-Ban-ORB3025-Polarized-Aviator-Sunglasses/dp/B00K1CBGXM/ref=sr_1_8?ie=UTF8&qid=1476308534&sr=8-8&keywords=rayban+gold+aviators', 'B00K1CBGXM'),
(2, 'https://www.amazon.ca/Ray-Ban-RB2132-Wayfarer-Sunglasses-Rubber/dp/B002Y2YSIC/ref=sr_1_2?ie=UTF8&qid=1476753821&sr=8-2&keywords=ray%2Bban&th=1', 'B001UQ71GO'),
(3, 'https://www.amazon.ca/Ray-Ban-RB-3016-W0366-49/dp/B0031T7VM2/ref=sr_1_3?ie=UTF8&qid=1476754536&sr=8-3&keywords=ray%2Bban&th=1', 'B016F5GD5Y'),
(4, 'https://www.amazon.ca/Ray-Ban-Round-Sunglasses-Driving-Category/dp/B00IEBAMGY/ref=sr_1_8?ie=UTF8&qid=1476754890&sr=8-8&keywords=ray%2Bban&th=1', 'B007Y82CDE'),
(5, 'https://www.amazon.ca/Ray-Ban-Mens-0RB3136-Rectangular-Sunglasses/dp/B015L2KPS8/ref=sr_1_12?ie=UTF8&qid=1476754890&sr=8-12&keywords=ray+ban', 'B018DXPRA8'),
(6, 'https://www.amazon.ca/Ray-Ban-0RB4165-Rectangular-Sunglasses-Rubber/dp/B009AJFC5U/ref=sr_1_16?ie=UTF8&qid=1476754890&sr=8-16&keywords=ray+ban', 'B009AJFC5U'),
(7, 'https://www.amazon.ca/RB4147-Square-Sunglasses-Non-Polarized-Gradient/dp/B005RB0Z3O/ref=sr_1_7?ie=UTF8&qid=1476754890&sr=8-7&keywords=ray%2Bban&th=1', 'B003KK5LEW'),
(8, 'https://www.amazon.ca/Ray-Ban-Original-Wayfarer-Sunglasses-Tortoise/dp/B002912664/ref=sr_1_3?ie=UTF8&qid=1476755886&sr=8-3&keywords=ray-ban&th=1', 'B002912664'),
(9, 'https://www.amazon.ca/Ray-Ban-Aviator-Sunglasses-Non-Polarized-Gradient/dp/B015L2LVHC/ref=sr_1_19?ie=UTF8&qid=1476756081&sr=8-19&keywords=ray-ban&th=1&psc=1', 'B015L2LVHC'),
(10, 'https://www.amazon.ca/Unisex-RB2027-Predator-Sunglasses-Black/dp/B001UQ71F0/ref=sr_1_3?s=apparel&ie=UTF8&qid=1476756242&sr=1-3&keywords=ray-ban', 'B001UQ71F0'),
(11, 'https://www.amazon.ca/Prada-Womens-Gradient-PR01OS-1AB3M1-55-Sunglasses/dp/B005R2MI74/ref=sr_1_2?ie=UTF8&qid=1476845912&sr=8-2&keywords=prada+sunglasses', 'B005R2MI74'),
(12, 'https://www.amazon.ca/Prada-Sport-Sunglasses-1BO1A1-Shiny/dp/B00DNXQY1A/ref=sr_1_4?ie=UTF8&qid=1476846390&sr=8-4&keywords=prada+sunglasses', 'B00DNXQY1A'),
(13, 'https://www.amazon.ca/Prada-Gradient-PR12QS-2AU6S1-54-Tortoiseshell-Sunglasses/dp/B00FJW4JJM/ref=sr_1_8?ie=UTF8&qid=1476846390&sr=8-8&keywords=prada+sunglasses', 'B00FJW4JJM'),
(14, 'https://www.amazon.ca/Prada-PR-22MS-Designer-Sunglasses/dp/B0040ECYJ2/ref=sr_1_7?ie=UTF8&qid=1476846390&sr=8-7&keywords=prada+sunglasses', 'B0040ECYJ2'),
(15, 'https://www.amazon.ca/Sunglasses-Prada-09QS-Matte-Cat-eye/dp/B00O1VEBDG/ref=sr_1_10?ie=UTF8&qid=1476846390&sr=8-10&keywords=prada+sunglasses', 'B00O1VEBDG'),
(16, 'https://www.amazon.ca/Gucci-2252-Aviator-Sunglasses-Gradient/dp/B00JB5GS8I/ref=sr_1_fkmr1_2?s=apparel&ie=UTF8&qid=1476921629&sr=1-2-fkmr1&keywords=gucci%2Baviator%2Bman%2Bsungalsses&th=1\r\n', 'B00JB5GS8I'),
(17, 'https://www.amazon.ca/Gucci-4239-Aviator-Sunglasses-Gradient/dp/B00JB64046/ref=sr_1_6?s=apparel&ie=UTF8&qid=1476921797&sr=1-6&keywords=gucci+aviator+women+sunglasses\r\n', 'B00JB64046'),
(18, 'https://www.amazon.ca/Gucci-Sunglasses-Shiny-Black-Gradient/dp/B00S9OREQ2/ref=sr_1_3?s=apparel&ie=UTF8&qid=1476932287&sr=1-3&keywords=gucci+aviator+unisex+sunglasses\r\n', 'B00S9OREQ2\r\n'),
(19, 'https://www.amazon.ca/Gucci-GG3720-SVQ-Sunglasses-Black-Pink/dp/B00MXR56QG/ref=sr_1_40?s=apparel&ie=UTF8&qid=1476830655&sr=1-40&keywords=sun+glasses\r\n', 'B00MXR56QG\r\n'),
(20, 'https://www.amazon.ca/Gucci-1079-Plastic-Sunglasses-Gradient/dp/B00MXQ7F5W/ref=sr_1_8?s=apparel&ie=UTF8&qid=1476933472&sr=1-8', 'B00MXQ7F5W\r\n'),
(21, 'https://www.amazon.ca/Gucci-Plastic-Rectangular-Sunglasses-Gradient/dp/B00MXR3LJA/ref=sr_1_10?s=apparel&ie=UTF8&qid=1476934095&sr=1-10&keywords=sun+glasses\r\n', 'B00MXR3LJA\r\n\r\n'),
(22, 'https://www.amazon.ca/Gucci-GG-3693-HD-Sunglasses/dp/B00MXR5M1K/ref=sr_1_7?s=apparel&ie=UTF8&qid=1476933472&sr=1-7', 'B00MXR5M1K'),
(23, 'https://www.amazon.ca/Gucci-3697-Plastic-Sunglasses-Gradient/dp/B00JB63X8K/ref=sr_1_11?s=apparel&ie=UTF8&qid=1476933472&sr=1-11\r\n', 'B00JB63X8K\r\n'),
(24, 'https://www.amazon.ca/Gucci-Womens-Sunglasses-Palladium-Mirror/dp/B00HI7VCWS/ref=sr_1_16?s=apparel&ie=UTF8&qid=1476933472&sr=1-16\r\n', 'B00HI7VCWS\r\n\r\n'),
(25, 'https://www.amazon.ca/Gucci-Womens-Rectangular-Sunglasses-Gradient/dp/B00MXR3YJ2/ref=sr_1_1?s=apparel&ie=UTF8&qid=1476933341&sr=1-1\r\n', 'B00MXR3YJ2'),
(26, 'https://www.amazon.ca/Gucci-1075-Rectangular-Sunglasses-Gradient/dp/B00MXQ74K8/ref=sr_1_13?s=apparel&ie=UTF8&qid=1476932784&sr=1-13&keywords=gucci+man\r\n', 'B00MXQ74K8'),
(27, 'https://www.amazon.ca/Gucci-Womens-2820-Sunglasses-Gradient/dp/B00JB641A4/ref=sr_1_12?s=apparel&ie=UTF8&qid=1476934095&sr=1-12&keywords=sun+glasses\r\n', 'B00JB641A4\r\n'),
(28, 'https://www.amazon.ca/Persol-Womens-PO3019S-95-Butterfly-Sunglasses/dp/B006TJMQ1M/ref=sr_1_3?ie=UTF8&qid=1477074926&sr=8-3&keywords=persol', 'B006TJMQ1M'),
(29, 'https://www.amazon.ca/Persol-PO0714-Folding-Polarized-Sunglasses/dp/B002B4A954/ref=sr_1_6?ie=UTF8&qid=1477074926&sr=8-6&keywords=persol', 'B002B4A954'),
(30, 'https://www.amazon.ca/Persol-Polarized-PO3048S-24-Tortoiseshell-Sunglasses/dp/B00CF3GBJO/ref=sr_1_8?ie=UTF8&qid=1477078975&sr=8-8&keywords=persol', 'B00CF3GBJO'),
(31, 'https://www.amazon.ca/Persol-Gradient-PO0714-24-Tortoiseshell-Sunglasses/dp/B001BL8842/ref=sr_1_13?ie=UTF8&qid=1477078975&sr=8-13&keywords=persol', 'B001BL8842'),
(32, 'https://www.amazon.ca/Persol-Polarized-PO2803S-95-Rectangle-Sunglasses/dp/B001A64CP2/ref=sr_1_18?ie=UTF8&qid=1477079837&sr=8-18&keywords=persol', 'B001A64CP2'),
(33, 'https://www.amazon.ca/Persol-Polarized-PO0649-95-Aviator-Sunglasses/dp/B002N7RR1I/ref=sr_1_22?ie=UTF8&qid=1477080065&sr=8-22&keywords=persol', 'B002N7RR1I'),
(34, 'https://www.amazon.ca/Persol-PO9649S-96-Tortoiseshell-Aviator-Sunglasses/dp/B00DXNZW54/ref=sr_1_23?ie=UTF8&qid=1477080065&sr=8-23&keywords=persol', 'B00DXNZW54'),
(35, 'https://www.amazon.ca/Oakley-Mirrored-Jupiter-OO9135-05-Sunglasses/dp/B005JSTCQG/ref=sr_1_3?s=apparel&ie=UTF8&qid=1477079674&sr=1-3&keywords=oakley%2Bsunglasses&th=1', 'B005JSTCQG'),
(36, 'https://www.amazon.ca/Persol-Polarized-PO3048S-900058-55-Square-Sunglasses/dp/B00CDL2K0C/ref=sr_1_28?ie=UTF8&qid=1477080065&sr=8-28&keywords=persol', 'B00CDL2K0C'),
(37, 'https://www.amazon.ca/Persol-Polarized-PO3059S-96-Square-Sunglasses/dp/B00FL7KGE2/ref=sr_1_36?ie=UTF8&qid=1477081052&sr=8-36&keywords=persol', 'B00FL7KGE2'),
(38, 'https://www.amazon.ca/Oakley-Talipin-OO4086-02-Aviator-Sunglasses/dp/B00URG61SW/ref=sr_1_4?s=apparel&ie=UTF8&qid=1477081259&sr=1-4&keywords=oakley+sunglasses', 'B00URG61SW'),
(39, 'https://www.amazon.ca/Persol-Gradient-PO2931S-102071-53-Black-Sunglasses/dp/B00ZISGQ02/ref=sr_1_50?ie=UTF8&qid=1477081387&sr=8-50&keywords=persol', 'B00ZISGQ02'),
(40, 'https://www.amazon.ca/Oakley-Feedback-Aviator-Sunglasses-Rose/dp/B00HYQAL70/ref=sr_1_7?s=apparel&ie=UTF8&qid=1477081791&sr=1-7&keywords=oakley+sunglasses', 'B00HYQAL70'),
(41, 'https://www.amazon.ca/Oakley-Given-OO4068-01-Sunglasses-Polished/dp/B00B190LE4/ref=sr_1_11?s=apparel&ie=UTF8&qid=1477082125&sr=1-11&keywords=oakley+sunglasses', 'B00B190LE4'),
(42, 'https://www.amazon.ca/Oakley-Turbine-OO9263-10-Rectangular-Sunglasses/dp/B00ST4O8TS/ref=sr_1_5?s=apparel&ie=UTF8&qid=1477082879&sr=1-5&keywords=oakley+sunglasses', 'B00ST4O8TS'),
(43, 'https://www.amazon.ca/Oakley-Turbine-OO9263-10-Rectangular-Sunglasses/dp/B00ST4O8GG/ref=sr_1_5?s=apparel&ie=UTF8&qid=1477082879&sr=1-5&keywords=oakley%2Bsunglasses&th=1', 'B00ST4O8GG'),
(44, 'https://www.amazon.ca/Oakley-Flak-2-0-Rectangular-Sunglasses/dp/B00UT4ELAM/ref=sr_1_16?s=apparel&ie=UTF8&qid=1477082879&sr=1-16&keywords=oakley+sunglasses', 'B00UT4ELAM'),
(45, 'https://www.amazon.ca/Oakley-Polarized-Sliver-OO9262-11-Sunglasses/dp/B00SUVGXFM/ref=sr_1_5?s=apparel&ie=UTF8&qid=1477083977&sr=1-5&keywords=oakley+sunglasses', 'B00SUVGXFM'),
(46, 'https://www.amazon.ca/Oakley-Frogskins-Wayfarer-Sunglasses-Brown/dp/B007MJEQY8/ref=sr_1_19?s=apparel&ie=UTF8&qid=1477083977&sr=1-19&keywords=oakley+sunglasses', 'B007MJEQY8'),
(47, 'https://www.amazon.ca/Oakley-Frogskins-24-297-Polarized-Sunglasses/dp/B005Y208ZQ/ref=sr_1_5?s=apparel&ie=UTF8&qid=1477084391&sr=1-5&keywords=oakley+sunglasses', 'B005Y208ZQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `glasses_id` (`glasses_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `face_pairings`
--
ALTER TABLE `face_pairings`
  ADD PRIMARY KEY (`category_id`,`face_shape_id`),
  ADD KEY `face_shape_id` (`face_shape_id`);

--
-- Indexes for table `face_shapes`
--
ALTER TABLE `face_shapes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shape` (`shape`);

--
-- Indexes for table `favourite_products`
--
ALTER TABLE `favourite_products`
  ADD PRIMARY KEY (`user_id`,`glasses_id`),
  ADD KEY `glasses_id` (`glasses_id`);

--
-- Indexes for table `glasses`
--
ALTER TABLE `glasses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `face_shape_id` (`face_shape_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD PRIMARY KEY (`glasses_id`,`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `face_shapes`
--
ALTER TABLE `face_shapes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `glasses`
--
ALTER TABLE `glasses`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_glasses_id` FOREIGN KEY (`glasses_id`) REFERENCES `glasses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_name` FOREIGN KEY (`user_name`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `face_pairings`
--
ALTER TABLE `face_pairings`
  ADD CONSTRAINT `face_pairings_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `face_pairings_ibfk_2` FOREIGN KEY (`face_shape_id`) REFERENCES `face_shapes` (`id`);

--
-- Constraints for table `favourite_products`
--
ALTER TABLE `favourite_products`
  ADD CONSTRAINT `favourite_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favourite_products_ibfk_2` FOREIGN KEY (`glasses_id`) REFERENCES `glasses` (`id`);

--
-- Constraints for table `glasses`
--
ALTER TABLE `glasses`
  ADD CONSTRAINT `glasses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `glasses_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `glasses_ibfk_3` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`face_shape_id`) REFERENCES `face_shapes` (`id`);

--
-- Constraints for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD CONSTRAINT `web_resources_ibfk_1` FOREIGN KEY (`glasses_id`) REFERENCES `glasses` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
