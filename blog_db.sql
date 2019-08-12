-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 12:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `blog_id`, `content`, `date`) VALUES
(1, 4, 14, 'comment test comment test', '2019-08-12 07:35:23'),
(2, 4, 14, 'Lorem ipsum dolor sit amet, cons', '2019-08-12 08:21:13'),
(3, 4, 1, 'Lorem ipsum dolor sit amet, cons', '2019-08-12 08:23:13'),
(4, 5, 2, 'falling in teeeee', '2019-08-12 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `small_desc` text NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `small_desc`, `content`, `author`, `date`) VALUES
(1, '5 Ways Exercise Helps You Manage Your Time Better', 'Staying active helps you power through your day, inside and outside the workplace.', 'Successfully running a business often hinges on how well you can manage your time. What some budding entrepreneurs donâ€™t know, however, is that you can improve your time management skills simply by runningâ€”literally. Setting aside some time each day for exercise can help you free up even more time, which in turn can be spent attending to other tasks. Working out can influence the way you work and help you deliver better results. Hereâ€™s how:\r\n\r\n\r\n1. Exercise improves your focus\r\n\r\n\r\nWhen your heart gets pumping, the blood flow to your brain improves. Studies have found that better brain circulation makes people feel more alert, which in turn makes it easier to focus on tasks. The more focused you are, the more efficiently you work, and the more time you free up for everything else.\r\n\r\nIf you want to maximize your stamina at the office, try starting each day with a brisk jog.\r\n\r\n\r\n2. Working out boosts your baseline energy levels\r\n\r\n\r\nPhysically active people tend to have more efficient metabolisms than those who donâ€™t work out. This means their bodies are able to convert food and fat into energy at a faster rate, even when at rest.\r\n\r\nWith higher energy levels, you tend to spend less time taking breaks at work. This gives you the opportunity to plan the rest of your day out, whether itâ€™s for other projects or for personal fun.\r\n\r\n\r\n3. Exercising reduces stress levels\r\n\r\n\r\nStress is the number one productivity killer. Not only does it weaken your drive; it can also reduce your long-term ability to perform. Stress negatively affects your health, and it can take you out of commission for a few days if you arenâ€™t careful.\r\n\r\n\r\nStudies show that stress hormone levels drop by a significant amount after exercise, and regular exercise helps keep them to a minimum. When stress levels are low, you work more efficiently, allowing you to manage your time a lot better.\r\n\r\n\r\n\r\n\r\n4. Physical activity helps you sleep better\r\n\r\n\r\nThe level of oneâ€™s productivity is more dependent on the quality of sleep than the number of hours you spend in bed. \r\n\r\n\r\nResearch shows that exercise helps people sleep better and in effect, theyâ€™re less likely to feel sluggish as the day passes.\r\n\r\n\r\nOnce youâ€™ve established a solid workout routine, you should feel a significant difference in how rested you feel upon waking. This, in turn, sets the tone for the rest of your day.\r\n\r\n\r\n\r\n\r\n5. Regular exercise helps build discipline\r\n\r\n\r\nCommitting to an exercise routine means youâ€™ll have less time for other activities throughout the day, and thatâ€™s not necessarily a bad thing. Youâ€™ll find yourself organizing your days a lot better to a point that everything fits in your schedule.\r\n\r\n\r\nRegular exercise teaches you the habit of creating schedules and sticking to them, which is a cornerstone of good time management.\r\n\r\n\r\n\r\n\r\nWith its real-time heart rate monitoring, sleep quality monitoring, and an assortment of movement trackers, the Huawei Watch GT makes the perfect accessory for those who want to lead an active lifestyle. It can assess your running, swimming, and biking activities with its built-in Triathlon Mode. It also has a Scientific Coaching feature that provides feedback on your training and a battery that can last for up to 22 hours. Three satellite positioning systemsâ€”GPS, GLONASS, and GALILEOâ€”ensure accurate readings of your exact location.\r\n\r\nThis watch monitors active and resting heart rate using infrared sensors with Huawei\'s TruSeen technology. On the other hand, you can enable TruSleep on the Huawei Health App to track your sleep patterns. It can detect six types of sleep problems by analyzing your breathing and sleeping patterns and monitoring your heart rate. Based on the collated data, TruSleep provides wellness suggestions such as meditation or exercising before bedtime to improve sleep quality.\r\n\r\nThe Huawei Watch GT has a customizable watch face and is available in two new colors: dark green and orange. No need to worry about the watch slipping off or causing an allergy; its fluoroelastomer strap is oil, corrosion, and heat-resistant.\r\n\r\n\r\nAnd since it comes with classic aesthetics on top of the usual telecommunications features that keep you on top of all your phone notifications, itâ€™s an ideal smartwatch for the entrepreneur on the go.\r\n\r\nVisit the Huawei Philippines website and Facebook page for more info.', '1', '2019-08-12 07:23:42'),
(2, 'Philippines Tops List Where More Women Than Men Have Internet Access', 'The country ranked first in addressing the digital gender gap.', 'We may have one of the least competitive Internet industries in the world, but the Philippines slightly makes up for it in another aspect—Internet access for women.\r\n\r\nIn the recently released Inclusive Internet Index by The Economist Intelligence Unit (EIU), the Philippines ranked first among 100 countries in the “Gender Gap in Internet Access” category, which measures the “gap between male and female access to the Internet.” Its figure for that category is -12 percent, which means that the number of Filipino women with Internet access exceeds the number of Filipino men by 12 percent.\r\n\r\nThis makes the Philippines one of only 12 countries in the index where more women can access the Internet than men. There are four other countries where the number of women and men who can access the Web is largely equal. These countries all contribute to lowering the gender gap behind Internet access.\r\n\r\n\r\n\r\nCONTINUE READING BELOW ↓\r\n\r\n“In a positive development, gender gaps in Internet access are narrowing globally, led by low-income and lower-middle-income countries,” wrote the EIU in the report. “On average, men are 24.8 percent more likely to have access to the Internet than women, compared with 31.5 percent last year.”\r\n\r\nMuch has been written about the importance of bringing more women online, as Internet usage not only provides easier access to information and social networks, but also gives opportunities for education and employment. Studies have also cited this digital gender gap as one of the major factors in the lack of women in industries relating to science, technology, engineering, and math (STEM).\r\n\r\nThis isn’t the first time the Philippines has been recognized for its gender parity. Last December, a World Economic Forum report on the global gender gap ranked the country as the most gender-equal in Asia.\r\n\r\nWhile the Philippines led the list in providing Internet access to women, it only ranked 66th in terms of overall Internet inclusivity due to less favorable results in other factors. The Inclusive Internet Index looks at several elements of Internet usage such as affordability, availability, and digital literacy.', '1', '2019-08-11 08:02:41'),
(3, 'Here\'s What Filipino Women Are Viewing on Pornhub', 'It looks like they\'re not too interested in fellow Filipinos.', 'In its 2018 Year in Review report, adult content platform Pornhub revealed that among its 20 most active markets, the Philippines had the highest proportion of female users. Filipino women made up 38 percent of the total Filipino visitors in Pornhub, much higher than the global figure of 29 percent.\r\n\r\nIn honor of International Women’s Day, Pornhub released a follow-up reportthat further breaks down what its female visitors are viewing. While most of its statistics focused on women in the U.S., the website did reveal a few interesting insights about its Filipina users.\r\n\r\nFor one, the most viewed category for Filipino women is Japanese. It’s a favorite they share with women from most other Southeast Asian countries as well as China, South Korea, and—of course—Japan.\r\n\r\nPornhub also revealed the top three relative categories for its biggest female markets, which it described as the video categories “that are proportionately more likely to be viewed by women [in the country] compared to other women around the world.” In other words, it’s the topics and kinks that women from a certain country prefer much more than their peers.\r\n\r\nCONTINUE READING BELOW ↓\r\n\r\nFor Filipinas, at the top of the list was “Romantic,” which they were 233 percent more likely to view than other female Pornhub users. “Behind the Scenes” was not far behind at 204 percent, and “Verified Couples” completed the top three at 160 percent.\r\n\r\nOne interesting absence in the top three: “Filipino.” Of the 20 countries reported in the study, at least half of them had their respective nationalities as a top relative category. Female users from Brazil, for example, were 862 percent more likely to view “Brazilian” content, while women from India were 1,787 percent more likely to view “Indian” videos.\r\n\r\nBut Filipina women don’t seem to be as interested in their own peers. It’s a trait they share with Argentinian women, whose top relative category was “Verified Models,” as well as with female users from the Netherlands, where neighboring “German” figured in their top three, but not “Dutch.”\r\n\r\nIn 2018, Pornhub recorded a total of 33.5 billion visits to its platform, which is about 92 million visits each day.', '1', '2019-08-11 08:02:41'),
(5, 'ICYMI: Proof-of-Parking Space Act, road clearing, Manila traffic', 'Did you catch all of these?', 'Senator pushes for immediate signing of Proof-of-Parking Space Act\r\nâ€œWeâ€™ve seen road-clearing operations ramping up in the past few weeks following President Rodrigo Duterteâ€™s orders to reclaim all public roads that are being used by private entities. In line with this, Senator Win Gatchalian recently requested the President to fast-track the passing of the Proof-of-Parking Space Act into law.â€\r\n\r\nâ€œSenate Bill No. 368, which was filed by Gatchalian last month, is the most recent version of the Proof-of-Parking Space Act; an earlier version was in the works late last year. If passed into law, it will require all potential vehicle buyersâ€”both individuals and businessesâ€”to present proof that they have proper parking spaces for their intended purchases. This will be in the form of an affidavit confirming the existence of an available parking area that has been acquired by the car buyer through purchase or lease.â€\r\n\r\nMMDA clears pedestrian overpass along EDSA, tells vendors not to return\r\nCONTINUE READING BELOW â†“\r\n\r\nâ€œThe Metropolitan Manila Development Authority (MMDA) has a message for vendors who put up stalls on pedestrian overpasses: Do not come back.â€\r\n\r\nâ€œA Facebook post released by the traffic agency earlier today, August 8, showed images of a free-flowing EDSA-Ortigas pedestrian walkway (near the Philippine Overseas Employment Administration building and EDSA Shrine) where clearing operations were recently conducted.â€\r\n\r\nManila City port problems along Roxas Boulevard worsens traffic situation in surrounding areas\r\nâ€œThe local government is already asking motorists to refrain from using Roxas Boulevard and its surrounding streets due to the immense traffic clogging up the area at the moment.â€\r\n\r\nâ€œAccording to city officials, the cause for the impeded flow of traffic is the weather and its impact on processing operations within the portâ€”in laymanâ€™s terms, the speed at which trucks can get in and out of the area.â€\r\n\r\nâ€œManila City mayor Isko Moreno added that the city is already coordinating with the Metropolitan Manila Development Authority (MMDA) to help deal with the situation. The Philippine Ports Authority (PPA) has also reportedly ordered some port operators to cease accepting truck bookings immediately.â€\r\n\r\nCONTINUE READING BELOW â†“\r\n\r\nDILG calls for barangays to take proper actions in support of the Metro Manila-wide road clearing operations\r\nâ€œThe Department of Interior and Local Government (DILG) is urging Metro Manila mayors to get tough on barangay captains who fail to keep their roads free of obstructions.â€\r\n\r\nâ€œâ€œWe have been deluged by complaints from the people about barangay captains who are failing to act and, worse, being complicit and actively tolerating road obstructions,â€ DILG undersecretary and spokesperson Jonathan Malaya said in a recent statement.â€\r\n\r\nâ€œThe call for discipline comes in the midst of NCR-wide road-clearing operations and a 60-day deadline imposed by the DILG for local governments to get their streets flowing freely again. By our count, cities have until September 26, 2019 to comply.â€\r\n\r\nFirst day of provincial bus ban dry run was unsuccessful, according to the MMDA\r\nâ€œIt appears bus commuters arenâ€™t the only ones who think that day one of the Metropolitan Manila Development Authorityâ€™s (MMDA) provincial bus ban dry run could have gone smoother.â€\r\n\r\nCONTINUE READING BELOW â†“\r\n\r\nâ€œAsked for an assessment of the dry runâ€™s first day, MMDA spokesperson Celine Pialago said: â€œIt is not successful.â€ The official pointed out two main reasons things didnâ€™t go as planned.\r\n\r\nâ€œâ€œFirst, we received this preliminary injunction that stops us from performing a particular act,â€ Pialago said. â€œTechnically speaking, we are prohibited from implementing the policy.â€â€\r\n\r\nâ€œâ€œSecond, the dry run is voluntary. We cannot force all bus operators to participate because of this court order,â€ she explained. â€œYet some provincial buses still unload passengers at our interim terminal because they committed to it beforehand. But the figures will show there is a lack of greater commitment, which is okay with us.â€â€', '3', '2019-08-12 03:11:24'),
(14, 'Soon-to-Open Japanese Luxury Hotel Welcome New Sales and Marketing Director', 'Hotel Okura will open later this year.', 'Hotel Okura Manila announces the appointment of Ms. Addie S. Capinding as Director of Sales and Marketing effective July 15, 2019. The Japanese luxury hotel, situated within Resorts World Manila, is slated to open its doors to the public within Q4 of this year in Manila, Philippines.\r\n\r\nMs. Capinding brings with her twenty years of sales and client management experience in the hotel industry.  She previously served as Director of Sales at Discovery Primea and had diverse work experience in the realm of sales and accounts management as she rose the ranks in her twelve years at the Peninsula Manila.  She has a Bachelor of Science degree in Behavioral Science from Miriam College. \r\n\r\nADVERTISEMENT - CONTINUE READING BELOW \r\n\r\n\r\n \r\n\r\n\r\nIMAGE Okura\r\n\r\n \r\n\r\nRegarding her appointment, Ms. Capinding said, â€œI am delighted to be joining the team of Hotel Okura Manila. I\'ve been hearing great things and am very excited to collaborate and work with each and every one in the team. I am positive that with our combined hard work, experience and efforts, we will elevate the luxury hotel experience and service standards of our hotel. Together, we will make Hotel Okura Manila into a landmark in Manila as we bring the wonderful fusion of Japanese service and signature Filipino hospitality.â€\r\n\r\nADVERTISEMENT - CONTINUE READING BELOW \r\n\r\nSpeaking on behalf of Hotel Okura Manila, General Manager Jan Marshall said, â€œWith Ms. Capindingâ€™s depth of experience in sales and client management in the hotel industry, coupled with her leadership strengths, we have a lot to look forward to and warmly welcome her to the Hotel Okura Manila team.â€\r\n\r\nYamazato: Soon to Open\r\nHotel Okuraâ€™s signature fine-dining restaurant, Yamazato is set to launch in October. It is highly regarded worldwide for its authentic Japanese cuisine tailored for discerning palates.\r\n\r\nIn 2002, at the Hotel Okura in Amsterdam, Yamazato was the first Japanese restaurant in Europe to earn the much-coveted Michelin star.', '4', '2019-08-12 07:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'ronald@gmail.com', 'ronald gmail', 'b28e6e72fbf60a29a5f8af3d45dcb53695cba656'),
(3, 'mike@yopmail.com', 'mike', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(4, 'ronald@yopmail.com', 'ronald yopmail', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(5, 'willie@yopmail.com', 'willieiss', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
