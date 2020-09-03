-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 04:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('rupeshmohanty67@gmail.com', 'test@12345'),
('msr@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(100) NOT NULL,
  `bname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `aname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  `brief` mediumtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` longtext CHARACTER SET latin1 NOT NULL,
  `likes` int(255) DEFAULT 0,
  `views` int(255) DEFAULT 0,
  `aimage` varchar(255) DEFAULT '',
  `comments` int(255) DEFAULT 0,
  `read_time` int(255) DEFAULT NULL,
  `top_blog_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `bname`, `aname`, `date`, `brief`, `image`, `content`, `likes`, `views`, `aimage`, `comments`, `read_time`, `top_blog_status`) VALUES
(16, 'IS CITIZENSHIP LAW HURTING INDIA\'S GLOBAL IMAGE?', 'Vivek Yadav', '2020-06-21', 'At the time once the Citizenship Amendment Act (CAA), is debated within the country, not a lot of attention has been paid to its external implications. The Act grants citizenship to everyone except Muslims from Afghanistan, Pakistan, and Bangladesh have returned to India before New Year\'s Eve, 2014.', 'protest.jpg', 'At the time once the Citizenship Amendment Act (CAA), is debated within the country, not a lot of attention has been paid to its external implications. The Act grants citizenship to everyone except Muslims from Afghanistan, Pakistan, and Bangladesh have returned to India before New Year\'s Eve, 2014.\r\n\r\nWith an honest section of scholars, youths, and the Muslim community still hold protest against CAA for over a month, the problem has begun to draw international attention. The International Organization Human Rights Commission (UNHRC) has already referred to the ACT as ‘fundamentally discriminatory’. One has to recall here that once the Modi government abolished the Article 370 and altered the standing of Jammu and Kashmir from full statehood to Union Territory, the planet failed to listen to Pakistan’s outcry on the topic matter and thought of the problem as ‘internal matter’ of the Govt. of India.\r\n\r\nHowever, the goodwill that PM Modi has generated within the last 5 years within the international arena is losing its momentum. One of the clear indicators of this trend is an assemblage of the meeting of Foreign Ministers of Organization of Islamic Cooperation (OIC) over Jammu and Kashmir. Therefore, whereas this state of affairs is one where India doesn\'t stand to lose a lot of tangibly within the short run, its systematic defensive stance on the CAA and also the state’s guilt in riots and violence threaten to alienate the remainder of the planet and impose vital prices in terms of diplomatic capital and trade relations.', 39, 0, 'dinesh.jpeg', 3, NULL, 1),
(17, 'HOW THE COVID – 19 PANDEMIC IS PUSHING THE WORLD INTO MENTAL HEALTH FALLOUT', 'Samridhi Sharda', '2020-06-20', '“It’s easy to blame it’s easy to politicize, it’s harder to tackle a problem together and find solutions together.”', 'covid19.jpg', '\r\nA pandemic is a serious public health emergency and drastic containment measures areunavoidable. The Covid-19 pandemic today, poses an urgent threat to both the physical welfare and the collective economic health of our communities. Almost all economies in the world today, have declared a public health emergency due to the spread of the deadly coronavirus, and as the economies struggle to contain this spread, a total lockdown; the harshest measure has been imposed, assuming a necessity for the containment and preservation of public health.\r\n\r\n\r\nIn the wake of the enormously volatile global situation created by Covid-19, it is important to acknowledge that this is not only a medical crisis and while our economies struggle with the daily dose of death, isolation, fear and mis-information, a historic wave of mental health fallout is approaching and waiting to erupt. Given the apocalyptic speed with which the Covid – 19 is sweeping and Depending on how long we’re forced to exist in this suspended state, it could get a whole lot worse. Although mental health issues account up toat least 10 percent of the world’s population is affected, and that 20 percent of children and adolescents suffer from some type of mental disorder.[i] These issues tend to be under- addressed and overlooked in our society due to the stigma associated with it and even more so, during a deadly virus outbreak. This today, has created unusual situations which were never dreamt of and these unprecedented times faced with the new realities of quarantine, work from home, unemployment and lack of physical contact , bring with them the increased responsibility to look after our mental health along with our physical health.\r\n\r\n\r\nWhen a pandemic strikes, it often casts a shadow of psychological trauma and societal injuries which receiving no or less attention wreaks carnage and upheavals families. The trauma it creates can affect people in all sorts of ways, both individually and collectively. It’s scary and the truth is, it might get much more worse. As if the prevailing atmosphere of stress and negativity is not enough, the current reality includes bigger aspects of financial troubles, health scares, political disturbance and the failing economy. Even when things start to look a little positive, the talk of a second wave brings the situation back to reality again.\r\n\r\n\r\nMental health is a major concern across the globe including India. Dr. Brock Chisholm, the first Director-General of the World Health Organization (WHO), in 1954, had presciently declared that “without mental health there can be no true physical health.”\r\n\r\n\r\nIn a bid to curb community transmission of COVID-19, many national governments have limited human interaction and resorted to activating emergency measures, such as imposition of lockdowns, closure of schools, self-isolation, limiting the people in public places and at ceremonies, such as weddings and burials to ensure physical distancing. The family and friends are not given permission to visit their sick ones due to fear of further transmitting the virus, combined with the loss of loved ones has dramatically increased the level of chaos and unrest in our societies.\r\n\r\n\r\nUndoubtedly, there is an increase in psychological impacts compared to pre- corona world, with increased levels of stress, anxiety, alcohol abuse, loneliness and self harm leading to depression and suicide. The concerns that a mental health outbreak could occur in the midst of the current corona outbreak is legitimate and devastating. Socio – economic disparities are on the rise due to unemployment and unequal access to resources. The term “vicarious trauma” was first described in 1996 and was initially applied to situations where psychotherapists became affected by long-term contact with patients with mental diseases and manifested mental symptoms similar to psychological trauma. The term has since been widened to include compassion for trauma survivors resulting in physical symptoms such as loss of appetite, irritability, fatigue and sleep disorders. Given the catastrophic state of the situation, it is very likely that traumatic events will occur in hospital environments dealing with the COVID-19 pandemic.\r\n\r\n\r\n“We don’t care, until we care” - The tragic death of actor Sushant Singh Rajput and the gloom of the Covid-19 pandemic have led to much-needed conversations on mental health in the country. The recent debate and attention of people towards mental wellbeing was raised when actor Sushant Singh Rajput allegedly committed suicide and when the recent scandal of the ‘boys locker room’ went viral questioning “why do people only react to mental health after celebrity suicides or reports of bullying go viral?” This crisis has the ability to spark reforms which have been long – due. It is important that mental and behavioral health should be incorporated in health response strategies and this should be seen as an opportunity into strengthening our mental wellness policies with potential of greater social transformation. Public outcry runs on the context of better availability of mental health resources but no one knows what it means.\r\n\r\n\r\nThere is an increased need for prioritization of mental health provisions for governance frameworks to address mental health literacy along with reduction of the stigma attached to it. The Australian government has already declared a $1.1 billion package to improve mental health efficiency for its people. It is also important to note that legislations do not make a person more mentally resilient or the availability of greater access to mental health resources such as counselors does not mean people will use them, unless the root of the problem is solved; the stigma attached to it. A lot has to do with the way we talk about mental health and how people look at it, which is what I think, deserves greater attention. Whether consciously or sub consciously it carries the burden of how it is seen.\r\n\r\n\r\nThe WHO has itself released guidance on mental health and psychological considerations specifically targeting the frontline healthcare workers. For the general population it talks about addressing this change with compassion and kindness, amplify positivity and hope, adopting a positive lifestyle, maintaining social links and inculcating healthy eating habits. It also talks about establishment of community collations and communication platforms for elders and infirm who are having difficulty in coping with the lockdown.\r\n\r\n\r\nThe conversation however has to begin from us. These transformations simply won\'t happen overnight. Our mental health system is fundamentally broken and understaffed and is in no way prepared to cope with the influx of mental health problems on healthcare professionals and people for that matter following such a mass tragedy. We need to think about ways to prevent mental health from deteriorating while also developing innovative ways to target groups at risk, particularly health care workers.\r\n\r\n', 12, 0, '', 1, NULL, 0),
(18, 'ONLINE BETTING IN INDIA', 'Diksha Mehta', '2020-08-02', '  “At the gambling table, there are no fathers and sons” ', 'betting.jpg', 'Online betting in India has become rampant and uncontrolled. Gambling has been prevalent in Indian society from the ancient times. In India betting is considered as a wager. The Indian contact act, 1872 deals with wagering agreements. Apart from it, public gambling act, 1867 prevents gambling in public arenas.\r\n\r\n\r\nOnline betting laws are still unclear in India and are being developed. There have been surge of number of users participating in online betting’s especially during IPL, FIFA etc. there are various website that encourage users to bet online and they evade the law under the disguise of skill and knowledge which forms exception under Indian contact act, 1872.\r\n\r\n\r\nSection 30 of Indian contract act, 1872 talks about wager agreements. In India, wager agreements are void ab intio. In the case of Subhash Kumar Manwani v. State of Madhya Pradesh[1] the Honorable court identified some reasons why gambling contacts are void ab-intio. The court said that spending time on useless activity where no skill, brain etc is required will hamper the overall development of an individual and law prohibit such acts.\r\n\r\n\r\nBut there are two exceptions under section 30 which are as follows: -\r\n\r\nHorse racing- if a party gambles or bet for an amount more than 500 rupees it will not be considered as a void agreement.\r\n\r\nPuzzle/crossword competition - If a competition requires one’s intellectual capacity, adroitness etc then it will not fall under the ambit of wager agreements.\r\n\r\nAs the subject of online betting falls under the state list, so state has the jurisdiction to make laws regarding the same. In order to understand online betting, we need to deliberate upon the mechanism and framework agreed by centre and different states to regulate it.\r\n\r\n\r\nSikkim is the only state to allow betting online by giving permission to golden gaming private international to run its operations in the state in 2016. Apart from it, Sikkim On-line Gaming (Regulations) Rules, 2009 have been made in this regard which differentiate certain legal games that can be played online but with certain regulations and conditions. States like Nagaland, Telangana have passed amendments to gambling laws in order to incorporate changes in law with changed scenarios.\r\n\r\n\r\nOther states like Maharashtra, Karnataka have expressly banned any type of betting. While other states have recognised some activities as legal and other states have till now taken no stand on this issue and is still juggling with different opinions.\r\n\r\n\r\nMoreover, these laws are existent from the colonial times and due to changing needs of the society, we need new laws in order to control illegal activities. Since online betting is becoming ubiquitous now a days due to digitalisation but we lack the legal framework to address the concerns associated with it. Moreover, we have almost negligible cases on online betting.\r\n\r\n\r\nIn the case of Delhi District Court: Gaussian Network Pvt. Ltd. v. Monica Lakhanpal[2], the court enumerated on the issues of online betting/gambling by giving few guidelines. But after the final submissions the petition was withdrawn. Therefore, there are no judgments on online betting in India as such.\r\n\r\n\r\nIn the 276th report of the Law commission there is recommendation for legalizing betting in India. Also keeping in view, the surreptitious nature of the act, there are many wrongful acts committed under the garb of online betting. Since, we know the source of money is unlawful it should to finance various terror operations, anti-national activities etc. one batch of policy makers argue to legalize gambling so that we can at least trace the source of money and it can also benefit the state exchequer. State government have to frame respective measures in order to regulate online betting.\r\n\r\n\r\nSince there is a lot of ambiguity regarding the online betting laws in India, it is on the whims of the respective state government to decide whether to legalize online betting or not considering all the pros and cons of the situation.', 5, 0, '', 0, NULL, 0),
(19, 'GLORIFICATION OF ENCOUNTER KILLING', 'Nandini Hooda', '2020-06-21', '', '4gun.jpg', 'When the infamous gangster Vikas dubey was taken into custody, my friend called to have a conversation regarding the same and told me that tomorrow there’ll be news regarding the encounter of Vikas Dubey. Next day, the news that Vikas Dubey tried to flee from the police custody and was killed in an encounter was all over the news channels. I wasn’t shocked nor was my friend. Even my family members felt this was very much expected. It’s like we already knew that this is what\'s going to happen next. The topic of Encounter killings has always been a debatable topic but in the past few months, it has become a trend. It is just how the encounter killings are shown in the Bollywood movies. UP police has become the new celebrity in town, emboldened by the open public support of their so-called encounter. Even the ministers are glorifying the encounter even after knowing the fact that it was a fake encounter. This trend of glorifying the encounter killing has clearly stated that the faith of public is being shifted from the judiciary. Cheering the police for killing the accused in fake encounters is sort of giving them a free permit to dispense justice.', 2, 0, '', 0, NULL, 1),
(20, 'LEGALITY OF LOCKDOWN', 'Amisha Tandon', '2020-07-21', '', '5lockdown.jpg', 'INTRODUCTION:\r\n\r\nA lockdown was imposed in India due to Covid-19 pandemic, thus whole nation was in home arrest. Although, the word lockdown is a new term which came in front of the country as this isn’t a legal term. There are various laws for epidemics and disasters but none of them have provisions regarding confinement of people nation widely at their homes. It was started with the announcement of JANTA CURFEW, as a day was given to the citizens of country to make their lives and livelihoods in an orderly manner. Then after that a national lockdown was announced by Prime Minister which was witnessed by the country as a disorganised outcome seen at railway stations, inter-state bus terminals, state borders, labour markets, etc, as it gave rise to huge number of unemployment for labour class of country while being far away from their homes. \r\n\r\n\r\nLEGALITY:\r\n\r\nThe legality of national house arrest can be seen, if emergency is formally promulgated. But in this case, the provisions of emergency have not been even invoked. The Central Government took remedy of Article 256 in which it is stated that “the Centre can give direction on how to implement the laws made by parliament”. Moreover Article 257 stipulates that “the executive power of the states should be exercised in a manner that does not impede or prejudice the executive power of the centre”. Furthermore, the Centre also took remedy of two separate and distinct laws for acting against the Corona Pandemic i.e. Epidemic Diseases Act, 1897 (EDA) And Disaster Management Act, 2005 (DMA). Meanwhile, the competent authorities of several states issued order under section 144, CRPC which prohibit for collective assembling of more than five people in public places. \r\n\r\n\r\nCONCLUSION:\r\n\r\nThe lockdown directed to draw “Lakshman Rekha” at every citizen’s doorstep which has been evident as a VIRTUAL DEATH PUNISHMENT for migrant workers, street vendors, daily wagers and small traders. But, after this entire turbulent outcome also, the DOCTRINE OF NESSECITY affirms loud and clear that “NECESSITY KNOWS NO LAW.” ', 2, 0, '', 0, NULL, 1),
(21, 'Condition of Corporate Workforce in Time of Covid-19', 'Rashi Sharma', '2020-07-19', '', '6covid.jpg', 'Covid-19 has not only affected the globe in the area of medical science but it has covered all the aspects of the working conditions in the corporate area, governmental area and education and so on. It has affected the corporate business to the most but the current priority is the life of the citizens and people living in the country. Our prime minister quoted that “If there is life there is Wealth” and on this quote the working conditions are been focused upon. Axis Bank is the biggest example which has come up with the situation because 88% of the corporate people work under it in some way or the other and are working from the Home to not to loosen the benefit in this time too said by the HR Leader of the bank. Big companies and organizations are putting the life of employees above the productivity of team. Covid-19 situation has taught people of big inventories too work from home with lunch and chai break along with every session to provide the better motivation among employees. Microsoft being the biggest firm has too provided aids for the disabled employees and prioritizing household before work. Every company and firms are following the format of government to come up with this deadly situation soon.   ', 0, 0, '', 0, NULL, 0),
(22, 'FLAWS IN CONTRACT ACT', 'Vidit Lohia', '2020-08-01', '', '7contract.jpg', 'Agreements and contracts entered in India are governed by Indian Contract Act, 1872 (ICA). ICA is one of the oldest acts in India and is based on the English Common Law. All the aspects of contracts, right from offer, communication of offer, acceptance, performance, enforceability etc. are dealt under ICA.\r\n\r\n\r\nIt is said that a law which does not incorporate social change, turns infructuous, merely into a piece of paper, without any legal significance. ICA being such an old legislation, some of the provisions of ICA have still not evolved with time. There are flaws with some of the provisions of ICA which must be resolved as soon as possible by the legislation.\r\n\r\n\r\nContracts entered into by minors:-\r\n\r\nAccording to section 10 of the ICA, a valid contract must be entered into by the free consent of parties who are competent to contract, for a lawful consideration, for a lawful object and section 11 of ICA, specifically declare minors, as persons who are incompetent to contract. Although, section 19, 19A, 20 talks about validity of contracts entered into without free consent, but none of the sections of the contract specifically talks about the legal consequences of the contract entered by minors. There is no specific provision in the act specifically declaring them to be void or voidable or void ab initio. A ruling as pronounced by the Privy Council in 190, in the case of Mohori Bibi v. Dharmodas Ghosh has stated that contracts entered into by minors are void ab initio and are hence, unenforceable by either party. The decision of the Privy Council about a century ago has been applied in all the cases as if though it is an unamendable axiom and no provision of ICA specifically talks about this. This is one of the major flaws in ICA and this situation must be cleared as soon as possible through an amendment to the legislation.\r\n\r\n\r\nNon-recognition of non-compete clause:-\r\n\r\nSection 27 of ICA declares agreements in restraint of trade, saving those agreements, not to carry on business of which good will is sold, void. Thus, any contract with a non-compete clause will be declared as being in restraint of trade and hence, void. One of the primary advantages of a non-compete clause is that it provides business and the employers with a degree of protection. ICA should specifically recognize such non-compete clauses.\r\n\r\n\r\nProvisions as regards electronic or digital contracts:-\r\n\r\nE-commerce has become as one of the indispensable part of our lives. As the name suggests, it is the practice of trading, i.e. buying and selling goods and offering services through internet. The e-commerce system works basically by entering into various contracts over the internet, referred to as e-contracts. The Information Technology Act, 2000 is the legislation that legalizes e-contracts in India. As, ICA was enacted almost a century and a half ago, with a very few, handful, insignificant amendments to it, ICA does not statutorily recognize and deal with e-contracts. Various aspects like rights, liabilities, jurisdiction in e-contracts are not at all covered separately under ICA. The same clauses which apply to pen & paper contracts continue to apply to e-contracts. There is a need for a specific chapter dealing with electronic contracts under ICA.\r\n\r\n\r\nUnfair agreements or contracts:-\r\n\r\nThe ICA has no specific provision dealing with unfair agreements or contracts. The courts have no power as of now under the act, suo moto declaring an agreement as unfair. ICA should be amended so as to specifically include provisions as regard this and the courts must have the power to declare an agreement as unfair, even though a plea about the same has not been raised by either of the parties of the contract.\r\n\r\n\r\nEnforcement of contracts in India:-\r\n\r\nOne of the fundamental flaws as regards contracts in India is as regards enforcement of contracts in India. According to study done, a few years back by the World Bank, India was ranked awfully low, that is as low as 186th among 189 countries as regards enforcement of commercial and infrastructural contracts. As per “The Ease of Doing Business Index Report”, contract enforcement in India on an average takes 1445 days and 30% of the value of the claim as cost. This can be attributed to India’s absolutely slow judicial system. A massive numbers of civil cases are pending before the civil courts in India. Huge court fees, expensive lawyers, and then a patient wait for years, is involved in almost every civil case in India. This has left the aggrieved parties under a contract with practically no judicial remedy. Referring the case to arbitration is one of the alternatives, but that too in India is affected by high costs, huge delays as compared to other countries like Singapore, Dubai. This makes arbitration out of reach of common citizen and big corporations often prefer to arbitrate their disputes in jurisdictions such as mentioned above, where disputes are dissolved within a matter of days, weeks or a maximum of few month.', 9, 0, '', 0, NULL, 0),
(23, 'COVID-19 : CRISES FACED BY MIGRANT WORKERS..', 'Diksha kuchiya', '2020-08-02', '', '8workers.jpg', '\r\nWhile Indian media is busy in showing Amitabh bacchan’s and their family health report, migrant workers are still trying to recover from the situations they face during lockdown. All these suffering which can\'t even described in words they faced during covid-19 crises \r\n\r\n\r\nProblems faced by migrants during lockdown-\r\n\r\n1. No work and income- during lockdown the factories and industries shut down by the government which created havoc in migrants\' lives, As they faced hardships in earning and feeding their families. \r\n\r\n2. No means of transport- There are no means of transportation for travelling to their native places, thousands of migrants started their journey walking back home with families\r\n\r\n3. starvation- with limited means of food and water, several migrants and their families died from starvation\r\n\r\n4. No medical facilities- several migrants died as they didn\'t receive Medical facilities in time due to covid pandemic and negligence of government. \r\n\r\n5. police brutality- police departments are also created problems in these migrants lives During pandemic as they punishes the migrants for not following rules and also beats them for walking into the roads during lockdown. \r\n\r\n6. Negligence of government-when the PM announces the lockdown, they neglects the migrants Workers and later when the Situation worsens, government tries to provide them facilities but at that time, Hundreds of workers lost their lives due to accident, starvation, health problems and exhaustion. \r\n\r\n\r\nProblem in government schemes-\r\nLater the central and state government took measures to help and arranged transport facilities but these schemes also faced the issue of mismanagement. The contact details provided by the government for solving grievances of migrants are either not in service or the operator didn\'t listen to them. The food that the government promises to provide to migrants is not easily available to them due to corruption. they don\'t even get money for feeding their families by owners of industries or factories.\r\n\r\n\r\nMore than 300 migrant workers died during the lockdown period due to accidents, suicides, starvation, exhaustion and negligence of government. \r\n\r\n\r\nGovernment tries to bring Indians from a broad but they should also focuses on the migrants or poor classes as the survival is extremely difficult for them in this covid- 19 pandemic. ', 1, 0, '', 0, NULL, 0),
(24, 'POLICE ENCOUNTER RULES IN INDIA', 'Diksha Kuchiya', '2020-07-18', '', '9police.jpg', '\r\nAfter Telangana encounter, another encounter is making rounds all over social media. Vikas Dubey, renowned criminal of up was killed in police encounter on July 10 morning when vehicle carrying him met with an accident and he tries to escape, police officers shot him dead after clash happened between Vikas Dubey and police officers ,sources reported. \r\n\r\n\r\nBut the statement given by officers is heavily opposed by experts as they alleged that the statements are unconvincing. In Vikas Dubey\'s encounter case the Uttar Pradesh police on Friday (July 17) gave their statement to Supreme Court stating that the encounter was done under the guidelines made by the court.\r\n\r\n\r\nWhether it\'s fake or true, extra judicial killing or encounters made by police somehow questions the dignity and decisions of the judiciary.\r\n\r\n\r\nPOLICE ENCOUNTER RULES -\r\n\r\n\r\nAccording to the guidelines of Supreme Court after People’s Union for Civil Liberties & Anr v. State of Maharashtra[1], guidelines were laid down by Supreme Court so that the proper, effective and independent investigation can be made for encounter killings-\r\n\r\n\r\n1.Recording of information-whenever police receives any information regarding offence, it must be recorded either in writing or in electronic form \r\n\r\n2. Registration of fir- police must register the fir on the basis of information and redirected it to the court.\r\n\r\n3. Independent investigation- Eight minimum investigations have to be fulfilled by an independent CID team or team of police officers of another police station under surveillance of a senior officer. \r\n\r\n4. Magisterial investigation: There must be compulsory magisterial investigation in encounter deaths and a report must be sent to the Judicial Magistrate.\r\n\r\n5. Informing NHRC: The NHRC or State Human Rights Commission (as the case may be) must be immediately informed.\r\n\r\n6.  Providing Medical treatment: medical treatment must be provided to the injured victim/criminal and statement must be recorded by a Magistrate or Medical Officer along with the Certificate of Fitness.\r\n\r\n7. Forwarding of FIR, Panchamas: FIR, panchamas, sketch, and police diary entries must be forwarded to the concerned Court without any delay.\r\n\r\n8. Sending Report: After investigation, a report must be sent to the competent Court ensuring efficient and speedy trial.\r\n\r\n9. Informing family or relatives: In the case of the death of an accused criminal, their family or relatives must be informed at the earliest.\r\n\r\n10. Submission of Report: Bi-annual statements of all encounter killings must be sent to the NHRC by the DGPs by a set date in set format.\r\n\r\n11. Taking disciplinary action: Amounting to an offence under the IPC, disciplinary action must be taken against the police officer who is found guilty of wrongful encounter and that officer must be suspended until investigation takes place.\r\n\r\n12. Compensation: compensation must be provided to the dependants of the victim under section 357-A of CRPC.\r\n\r\n13. Capitulating Weapons: The concerned police officers must capitulate their weapons for forensic and ballistic analysis under Article 20 of constitution.\r\n\r\n14.  Providing Legal Aid to Officer: Information regarding the incident must be sent to the accused police officer’s family, offering services of lawyer/counselor.\r\n\r\n15. No awards or promotion: No promotion or awards shall be given to the officers involved in encounter killings soon after the event takes place.\r\n\r\n16. Grievance Redressal: If the family of the victim makes a complaint to the Sessions Judge about delayed or improper investigation. \r\n\r\n\r\nThe concerned Sessions Judge having jurisdiction must look into the merits of the complaint and address the grievances raised therein.\r\n\r\nThe Court directed that these guidelines or rules must be strictly followed in all cases of death and grievous injury in police encounters by treating these guidelines as law under Article 141 of the Indian Constitution.\r\n\r\n\r\nAccording to NHRC GUIDELINES 2010, if the police officer cannot justify the encounter killing and the death of the accused falls outside the jurisdiction of mentioned reasons. It can be categorized as crime and the police officer would be guilty of culpable homicide (an act which has resulted in a person\'s death but is held not to amount to murder).\r\n\r\n\r\nWhy are these guidelines and rules necessary?\r\n\r\nWhen people celebrates encounter killings whether it’s done by Telangana police in Priyanka Reddy\'s case or encounter of Vikas Dubey, one must think that may be these encounter can be fake or staged also. These encounters create opinion in public minds about the abandonment of the rule of law (Article 14) that appears to have led to this encounter. People made perception about the rule of law or judiciary always delays in providing justice thus a strong law or rules are required to create strong belief in people mind about judiciary. Thus it’s the need of time to provide fair and legal procedure\r\n\r\n\r\nEncounters are clear violation of article 21 -\r\n\r\nAccording to Article 21 of the constitution -”No person shall be deprived of his life or personal liberty except according to a procedure established by law.”... It is a fundamental right and is available to every citizen .Even the State cannot violate that right. There are certain procedures that have to be followed for investigation that have been prescribed under law.\r\n\r\nHence, it is the duty and responsibility of the police, being the officers of State, to follow the Constitutional rights given to citizens and protect the Right to Life of every individual whether that person is innocent or not.\r\n\r\n\r\nSimilarly in encounters are also the reason-\r\n\r\nThis is not the first time encounters are questioned, In 2008 two accused were encountered in Telangana similar to encounter in Priyanka Reddy’s case, the manner in which the criminals were taken to the crime spot for recreating the crime scene and later police officers shooting them down in an alleged crossfire. Hence, to stop these repetitions, the rules and guidelines of court became necessary.\r\n\r\n\r\nLegal framework-\r\nThere is no direct provision in law for encounter killings, all these encounters that take place are done in self defense by the police officer.\r\n\r\n IPC sections 96 to 106, states the law related to the right of private defense of person and of property. Under section 96, every person has a right to private defense, which is natural and inborn right.\r\n\r\nAccording to sec 100 of IPC, right of private defence of the body extends to causing death and sec 46 of Cr.P.C. lay down provisions regarding investigations in encounter killings and culpable homicides.\r\n\r\nIf the police officer found guilty of staged or fake encounter, he is charged under sec 299 of IPC i.e., culpable homicide and compensation have to be paid to family members of the accused\r\n\r\n\r\nIs encounter killings justifiable?\r\n\r\nPolice officers has right to injure or kill criminals and offenders for the purpose of self defence or to maintain law and order when it is extremely necessary but No officer has right to injure or kill that person for personal motives. It is the responsibility of the state to encourage police force to remove antisocial elements but state must punishes the murderers disguised as police. And it\'s the responsibility of police to make sure criminals are punished according to the procedures established by law, so that faith and dignity of court must be restored.\r\n\r\n\r\n [1] People’s Union for Civil Liberties & Anr v. State of Maharashtra, Criminal Appeal No.1255 OF 1999 (India).', 2, 0, '', 0, NULL, 0),
(25, 'LOAN MORATORIUM: BLESSING OR CURSE', ' Vivek Yadav', '2020-06-19', '', '10loan.jpg', 'A moratorium amount is that the time throughout a loan term once the receiver isn\'t needed to form any reimbursement. It\'s a waiting amount before that reimbursement of EMIs resumes. Moratoriums square measure usually enacted in response to temporary monetary hardships.\r\n\r\n\r\nAs a relief lives for individuals visible of the corona virus pandemic, (RBI) on March 27 allowed a 3-month moratorium on term-loan and MasterCard repayments. Initially, the moratorium was for payment of all installments falling due between March 1 and 31, 2020. Then the run batted in on 22nd might be an extended moratorium on term loans until 31st August. Lending establishments were directed to defer the EMIs of their customers choosing this moratorium theme. Well, in step with the run batted in, the delayed installments underneath the moratorium would come with:\r\n\r\n\r\na) Principal and/or interest components;\r\n\r\nb) Bullet repayments;\r\n\r\nc) Equated monthly installments (EMIs);\r\n\r\nd) MasterCard dues.\r\n\r\n\r\nThe Supreme Court has prompt that lenders charge interest throughout the 6-month moratorium amount declared by the run batted in, rather than levying interest (interest on interest). Banks and alternative lenders are permissible by the run batted in to permit borrowers to delay the payment of installments due between March 2020 and August 2020. But it\'s been created clear that interest can still accrue throughout this era and there\'ll be interest in such interest accruals (compound interest) still. Some borrowers have argued that this can be no relief in the least which the interest throughout the moratorium amount (March 2020 to August 2020) ought to even be waived or a minimum of solely interest ought to be charged throughout this era.\r\n\r\nTo understand this, let\'s take the instance of an equity credit line of Rs 50,00,000 outstanding as on Feb 1, 2020, at Associate in Nursing charge per unit of 8 percent, wherever 180 monthly installments of Rs 47,800 just about are collectible until Feb one, 2035. The borrowers argued that interest-free moratorium ought to be provided need to start out paying the primary installment solely in Sept 2020 and also the last installment in August 2035, therefore obtaining Associate in Nursing interest- free 6-month amount.\r\n\r\nBanks on the opposite hand claim that it\'s an income facility being given to the borrowers and interest can accrue for the moratorium amount still. For the given example the interest for this 6-month amounts to Rs. 2,03,000 just about, that gets else to the principal. Therefore, rather than 180 installments of Rs. 47,800 ranging from Sept 2020 (and finishing on August 2035) the number of installments increase to 194 and also the loan repayments can currently end in Oct 2036 rather than August 2035 earlier. In reality, the easy interest throughout the moratorium amount is Rs. 2,00,000 (instead of the interest of 2,03,000) and also the variety of installments stay at 194 with solely a miscalculation of distinction between the two figures.\r\n\r\nThe lenders with reason argue that it\'s unimaginable for them to produce Associate in Nursing interest-free amount to borrowers since they pay interest to their depositors for an equivalent amount. Besides the preventative value of providing such Associate in nursing interest release, it\'s been reportedly found out by SBI that quite 90 percent of the borrowers haven\'t availed of the moratorium provide.\r\n\r\nSolicitor General Tushar Mehta, showing for the Centre and therefore the Reserve Bank of India, told the apex court that waiving the interest fully won\'t be simple for banks as they need to pay interest to their depositors.\r\n\r\nA bench headed by Justice Ashok Bhushan discovered that after the moratorium is fastened then it ought to serve the required functions which the bench sees no benefit in charging interest on interest.\r\n\r\nThe bench, conjointly comprising Justices S K Kaul and Justice M R Monarch orally discovered that the government ought to take into account meddlesome within the matter because it cannot leave everything to banks.\r\n\r\nThe bench asked the Indian Banks Association to look at whether or not they will bring new tips within the meanwhile on the difficulty of loan moratorium.\r\n\r\n The apex court asked the Central government to improve and take a stand over the difficulty associated with charging interest on EMIs throughout the month moratorium amount.\r\n \r\n\r\nOnline Sources\r\n\r\n: https://m.economictimes.com/industry/banking/finance/banking/interest-waiver-during-loan-moratorium-supreme-court-lists-the-matter-for-first-week-of-august/articleshow/76419724.cms\r\n\r\n : https://economictimes.indiatimes.com/wealth/borrow/how-taking-loan-moratorium-will-impact-your-future-emis/articleshow/76230624.cms?from=mdr', 0, 0, '', 0, NULL, 0),
(26, 'CIVIL SUIT FOR DEFAMATION', 'Samridhi Sharda', '2020-08-11', '', '11civi.jpg', '\r\nDefamation can be described as the injury to the reputation, goodwill or character of an individual. This is an offence in both Criminal and Civil laws in India. Under Criminal law, defamation is an offence under section 499 of the Indian Penal Code, 1860bailable, non- cognizable and compoundable punishable with simple imprisonment up to two years or fine or both while under the civil laws, it is punishable under Law of torts with the imposition of punishment and awarding damages to the claimant. An action of defamation can only be made by the person defamed and not anyone else.[1] In a Civil defamation case, the claimant can either move to the High court or subordinate courts to seek monetary compensation. \r\n\r\nEssentials of Defamation:\r\n\r\n· Defamatory statement \r\n\r\n· General statements said in a broad perspective; ‘all politicians are corrupt’ are not defamatory statements\r\n\r\n· Statements which are of public importance or made by the court, governments are not defamatory statements. \r\n\r\n· Burden of proof lies on the plaintiff to prove that the statement against which he seeks action harms his goodwill and reputation beyond reasonable doubt. \r\n\r\nCivil defamation is constituted when the following conditions are satisfied; \r\n\r\n· Such defamatory statement must be made by the accused which injures the reputation of the claimant.\r\n\r\n· The statement must be mentioned by the plaintiff/ referred by the plaintiff - It is immaterial that the defendant did not really intend to defame the plaintiff. If the person to whom the statement was published could infer that the statement referred to the plaintiff, the defendant is liable.\r\n\r\n· And the same statement must be published; orally or in written form. \r\n\r\n \r\n\r\n \r\n\r\n[1] HarashMendiratta V. Maharaj Singh 2002 Cr. L.J 2651', 0, 0, '', 0, NULL, 0),
(27, 'CONTEMPT OF HOUSE', 'Aashita Jain', '2020-08-06', '', '12house.jpg', 'Contempt of house means intrusion with the parliamentary privileges and other kind of various acts that hinders the house and the members of the house in their working. The constitution of India gives certain kinds of privileges to the members of the parliament and the state legislatures so that they can work without any obstruction under article 105 of the Indian constitution which read as follows:\r\n\r\n\r\nPowers, privileges, etc of the Houses of Parliament and of the members and committees thereof\r\n\r\n\r\n1. Subject to the provisions of this constitution and the rules and standing orders regulating the procedure of Parliament, there shall be freedom of speech in Parliament\r\n\r\n2. No member of Parliament shall be liable to any proceedings in any court in respect of anything said or any vote given by him in Parliament or any committee thereof, and no person shall be so liable in respect of the publication by or under the authority of either House of Parliament of any report, paper, votes or proceedings\r\n\r\n3. In other respects, the powers, privileges and immunities of each House of Parliament, and of the members and the committees of each House, shall be such as may from time to time be defined by Parliament by law, and, until so defined shall be those of that House and of its members and committees immediately before the coming into force of Section 15 of the Constitution (Forty fourth Amendment) Act 1978 \r\n\r\n4. The provisions of clauses ( 1 ), ( 2 ) and ( 3 ) shall apply in relation to persons who by virtue of this constitution have the right to speak in, and otherwise to take part in the proceedings of, a House of Parliament or any committee thereof as they apply in relation to members of Parliament\r\n\r\n\r\nAnd under article 194 of the Indian constitution -Powers, privileges, etc, of the House of Legislatures and of the members and committees thereof, which is similar to that of the Parliament.\r\n\r\nSome instances of contempt of court are \r\n\r\n· Publication of false and distorted report about the parliamentary proceedings\r\n\r\n· Publication of the proceedings which take place in the secret sessions of the parliament\r\n\r\n· Offering bribes to the members of parliament and state legislature for influencing their parliamentary conduct\r\n\r\n· Causing hindrance to the officers of the house while doing their duties\r\n\r\n· Any kind of unfair practice or misconduct done by the members \r\n\r\nThe constitution of India also confers the powers on the house to punish the people for the contempt which arises from the breach of the privileges conferred on the members. This power to punish is exercised by the speaker of Lok Sabha or the Chairman of the Rajya Sabha.\r\n\r\n', 0, 0, '', 0, NULL, 0),
(28, 'PHONE TAPPING IN INDIA', 'Amisha Tandon', '2020-06-21', '', '13phone.jpg', 'INTRODUCTION:\r\n\r\n\r\nIn this 21st century, technology has only advanced in India day by day. Technology has played a major role in development with lot of its advantages but the fact that every coin has two sides is cannot denied in the case of technology also. If technology has made our life easy then it has also made our privacy to be at stake. \r\n\r\n\r\nNow talking about one of the discovery in technology i.e. Phone Tapping which means, secretly recording or listening telephonic activities of another person to gain information from that person. \r\n\r\n\r\nINDIAN PERSPECTIVE ON PHONE TAPPING:\r\n\r\n\r\nIn India, phone tapping can only be done in the hands of authorised person in an authorised manner by taking prior permission of concerned department. Telephonic and other communication devices are specified under Entry 31 of the Union List of the Constitution and Entry 7 of the Federal List of the Government of India Act, 1935.\r\n\r\n\r\n The Laws for Phone Tapping is administered in India under Section 5(2) of Indian Telegraphic Act, 1885 by Central Government and State Government, having the authority to tap the phone for the purpose of doing investigation against the person under suspicion after seeking permission from the Home Ministry and State Home Secretary respectively.\r\n\r\n\r\nREMEDY FOR PHONE TAPPING IN INDIA:\r\n\r\n\r\nPhone Tapping can become an issue if it comes in the hands of a person who wants to misuse the information of another in an unauthorized manner then this may lead to prosecution for breach of right to privacy provided by India Constitution by filing complaint in National Human Right Commission, filing FIR against unauthorised tapping and can move to the court for seeking remedy under Section 26(b) of Indian Telegraphic Act.\r\n\r\n ', 5, 0, '', 1, NULL, 0),
(29, 'ANIMAL SACRIFICE FOR OFFERING TO DEITIES', 'Gargi Santra', '2020-06-25', '', '14goat.jpg', '\r\nHinduism is the oldest practiced religion in the world and sacrificing animals to gods and goddesses has been prevalent ever since then. In verse 10.86.14 of the Rig Veda, God Indra says, “they cook for me 15 to 20 plus oxen”. This verse has a lot of different explanations and has led to a number of controversies. When one group argues that this verse clearly says that animal sacrifices have been mentioned and justified in the Vedas, the other group says that one should not look at the literal meaning only but have a clear understanding looking into the deeper meaning of the text and it is unfair to judge by going through only one single verse and not the whole text and scriptures of the Vedas. The reality is that apart from all these controversies several temples and families still believe and carry out the practice of animal offerings to deities in the name of a holy thing. \r\n\r\n\r\nThe Prevention of Cruelty to Animals Act, 1960 allows killing of animals for consumption and prevents any unnecessary infliction of pain to animals. The Act does not contain any clause which explicitly talks about animal sacrifices to deities. A thorough reading of the Act clears that only section 28 of the Act talks about religion and animal killings where it protects the manner of killing of the animal as prescribed by the religion of any community but it does not speak about the purpose for which the animal is being killed. Recently petitions have been filed from different states regarding the issue of animal sacrifices to deities. The law which is currently under challenge is the Kerala Animals and Bird Sacrifices (Prevention) Act, 1968 which prohibits animal sacrifices and birds in temples. It has been challenged on the ground that it violates Article14, Article 25 and Article 26 of the Constitution.\r\n\r\n\r\nBeing raised up in a Hindu family I have come across instances of animal offerings happening in temples and popular festivals. But the lesser known fact is after these offerings takes place, the meat is distributed and cooked for food. And the problem lies here. Apart from the petition filed in the Supreme Court challenging the constitutional validity of the Kerala Animals and Bird Sacrifices (Prohibition) Act, 1968, a similar petition was filed in the Supreme Court previously by the government of Tripura challenging the verdict of a division bench of the Tripura High Court in the case of Sri Subhas Bhattacharjee vs The State Of Tripura on 27 September, 2019, where it was held that any sacrifice of bird or animal within the precincts of temple within the State of Tripura would be prohibited. The Supreme Court has guaranteed the “right to life” to animals as well. In the case of Animal Welfare Board v. Nagraj and Others, the Supreme Court in 2014 held that Jallikattu, the famous sport of Tamil Nadu should be banned as it violates the “right to life” of the bull and thereafter the sport was completely banned. A similar argument can be drawn on this basis that animal sacrifices to deity should also be banned on the ground that it violates the right to life of the animal and amounts to animal cruelty. But similarly another argument says that, when animal killings is permitted for the sake of food then why not as offerings to deities which in the end is ultimately used as consumption purpose? It is yet to be decided by the Apex Court. The verdict of the Supreme Court relating to this matter might urge us to halt and change the age old customs of worship in the coming future.', 3, 0, '', 2, NULL, 0);
INSERT INTO `blog` (`id`, `bname`, `aname`, `date`, `brief`, `image`, `content`, `likes`, `views`, `aimage`, `comments`, `read_time`, `top_blog_status`) VALUES
(30, 'LIVE- IN RELATIONSHIP LAWS IN INDIA', 'Samridhi Sharda', '2020-07-05', '', '15relationship.jpg', 'India is a nation where marriages are perceived as holy sacraments and not just the union of two people. The legal ramifications of this matrimony further contribute to the sacredness of this union and empower both individuals to form not only family relationships but also gives them a plethora of other rights. In the recent years, Indian societies have witnessed an immense growth in the status of live-in relationships. This is a form of living arrangement wherein, a couple starts living together and co- habituating under the same roof, without getting married. \r\n\r\n\r\nAccording to the Indian Law, a live-in relationship is still an alien concept and thus there are no specific legislations regarding it. Personal lawsdo not recognize this form of matrimony but Hindu Marriage Act, 1955 grants inheritance rights to children born out of such wedlock.  Such relations are thuslegally valid but not legally binding in India.Legal recognition to this type of relationship has been given by courts in several landmark judgment’s – Badri Prasad v. Dy. Director of Consolidation and Indra Sarma v. VKV Sarma where the court defined live- in relations in five different ways and regarded that it is domestic cohabitation between unmarried man and woman comes under the purview of right to life and thus is not a crime. The Protection of Women from Domestic Violence Act, 2005 provides certain protections, provisions and alimony for maintenance and rights to the aggrieved live-in partner. The Code of Criminal Procedure, 1973 has also been incorporated under Section 125 in order to avoid delinquency and abuse of partners which has now been expanded by judicial definitions. The Indian Evidence Act, 1872 clearly specifies the reasonable period; where a man and a woman have lived together for a long period of time, there is an assumption of marriage. \r\n\r\n', 2, 0, '', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `blog_comment` longtext DEFAULT NULL,
  `blog_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_likes`
--

CREATE TABLE `blog_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `like_status` int(11) DEFAULT NULL,
  `blog_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_likes`
--

INSERT INTO `blog_likes` (`id`, `user_id`, `like_status`, `blog_id`) VALUES
(1, 33, 1, 16),
(2, 33, 1, 17),
(3, 33, 1, 16),
(4, 33, 0, 18),
(5, 33, 1, 17),
(6, 36, 1, 16),
(7, 36, 0, 17),
(8, 37, 1, 17),
(9, 37, 1, 18),
(10, 37, 1, 16),
(11, 37, 1, 18),
(12, 37, 1, 17),
(13, 37, 1, 16),
(14, 37, 1, 17),
(15, 37, 1, 18),
(16, 37, 1, 17),
(17, 37, 1, 17),
(18, 37, 0, 22),
(19, 37, 1, 29),
(20, 37, 1, 28),
(21, 37, 1, 30),
(22, 37, 0, 17),
(23, 38, 0, 17),
(24, 38, 1, 28),
(25, 38, 0, 29),
(26, 38, 1, 30),
(27, 38, 0, 17),
(28, 39, 1, 19),
(29, 39, 1, 20),
(30, 39, 0, 21),
(31, 39, 1, 16),
(32, 39, 1, 20),
(33, 39, 1, 16),
(34, 39, 1, 17),
(35, 39, 1, 23),
(36, 39, 1, 28),
(37, 39, 1, 29),
(38, 39, 0, 30),
(39, 39, 1, 16),
(40, 39, 0, 18),
(41, 40, 1, 29),
(42, 40, 1, 28),
(43, 40, 0, 16),
(44, 40, 0, 16),
(45, 40, 0, 16),
(46, 40, 0, 16),
(47, 42, 1, 16),
(48, 73, 1, 16),
(49, 73, 0, 17),
(50, 73, 0, 26),
(51, 73, 0, 16),
(52, 73, 0, 16),
(53, 1, 0, 18),
(54, 1, 0, 17),
(55, 75, 1, 17),
(56, 75, 0, 16),
(57, 1, 0, 19),
(58, 1, 0, 17),
(59, 1, 1, 16),
(60, 1, 1, 16),
(61, 1, 0, 17),
(62, 1, 1, 16),
(63, 1, 1, 16),
(64, 1, 1, 28),
(65, 1, 1, 16),
(66, 79, 0, 16),
(67, 1, 0, 18),
(68, 1, 1, 16),
(69, 1, 0, 18),
(70, 8, 0, 28),
(71, 13, 0, 22),
(72, 15, 0, 16),
(73, 15, 1, 18),
(74, 1, 1, 16),
(75, 4, 0, 17),
(76, 4, 0, 16),
(77, 1, 1, 16),
(78, 1, 0, 16),
(79, 1, 0, 19),
(80, 1, 0, 16),
(81, 1, 0, 16),
(82, 1, 0, 16),
(83, 3, 0, 16),
(84, 2, 0, 18),
(85, 2, 1, 16),
(86, 2, 1, 16),
(87, 2, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) NOT NULL,
  `ename` varchar(255) CHARACTER SET latin1 NOT NULL,
  `start_date` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ephoto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `etype` varchar(255) CHARACTER SET latin1 NOT NULL,
  `edetails` longtext CHARACTER SET latin1 NOT NULL,
  `event_video` varchar(200) DEFAULT NULL,
  `event_likes` int(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `event_playlist` varchar(255) DEFAULT NULL,
  `event_love` int(255) DEFAULT NULL,
  `etagline` mediumtext DEFAULT NULL,
  `other_link` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `ename`, `start_date`, `ephoto`, `etype`, `edetails`, `event_video`, `event_likes`, `end_date`, `event_playlist`, `event_love`, `etagline`, `other_link`) VALUES
(18, 'Training Program on Legal Research and Writing.', '2020-07-26', 'Main Pic_Event 1.png', 'completed', 'Are you worried about publications, and how to write research papers? It is probably because you do not have proper guidance. This is not a short workshop but a 15 days training program where we don’t give you a monologous lecture on how to research. We make you work on a research proposal, conduct research on short issues and assist you until you complete a paper of your own.', '', 8, '2020-08-10', 'https://drive.google.com/file/d/1Iloy9889BS7bfX_uE4jQq7axUQGc6EQw/view?usp=sharing ', NULL, 'Ace the art of legal research and paper publication with our team!\r\n', ''),
(19, 'Three Days Talk on the Doctrine of Basic Structure', '2020-07-06', 'Main Pic_Event 2.jpeg', 'completed', 'Does reading the bulky Kesavananda Bharati judgment prevent you from knowing the entire case? Well, TLC has made it easier to understand the judgment now by dividing it into three interesting and interactive sessions which also include those unheard facts about the case that can make you doubt the sanctity of the judgment.', 'https://www.youtube.com/embed/EvKxpYkvmVU', 6, '2020-07-08', 'https://www.youtube.com/playlist?list=PLmy3R7UgHboi0tTPEE4QmIJurjq1RW1xu  ', NULL, '10 unheard stories behind the Kesavananda Bharati Judgment!', ''),
(20, ' Online Quiz Competition on the Doctrine of Basic Structure', '2020-07-10', 'Main Pic_Event 3.jpg', 'completed', 'Did you know that Nani Palkhivala who fought against the Indira Gandhi government in the Kesavananda Bharati case was her lawyer in Indira gandhi v. Raj Narain? If these questions bring a tickling sensation in you as well, then this event is tailor-made for you. Participate and enjoy the quiz where you learn by practising and not memorizing.', '', 0, '2020-08-10', ' ', NULL, 'There is no more enriching experience than application of knowledge that you recently gained!', 'https://drive.google.com/file/d/1M9zAoRIACO66_Z2ufghgAhAzElPX4tr_/view?usp=sharing'),
(21, 'How to Decide your Law School?', '2020-07-16', 'Main Pic_Event SSCorner.png', 'sscorner', 'Private or Public? Low-ranked NLUs or Other Colleges? These questions are faced by every law aspirant and they become even more intense as and when CLAT comes nearer. This course is a ‘diploma’ on answering these questions. It includes the factors essential in determining a perfect law school as per your choice and interviews of final year law students from who faced the same questions during their time. Check out whether they took the right decision or not.', 'https://www.youtube.com/embed/BFC8UsnMGj0 ', 1, '2020-08-27', ' ', NULL, '\"One decision can change your next five years. Take an informed decision with us!\"', ''),
(22, 'National Research Paper Writing Competition, 2020', '2020-08-10', 'Main Pic_Upcoming Event.png', 'upcoming', 'Publication in UGC recognised journals is a dream of every law student and specially those who love writing on legal and social issues. However, most of the time we are either not able to complete a research paper or not able to publish it for ‘n’ number of reasons. Well, not this time! After our training program on legal research, not one student will be left without a paper. If you did not attend the program, contact us for recordings now!', '', 1, '2020-10-10', ' ', NULL, ' \"Publication in a UGC Recognised Journal couldn\'t have been easier!\"', 'https://www.instagram.com/p/CDyNVYmJr2o/?utm_source=ig_web_copy_link ');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `comment_id` int(11) NOT NULL,
  `event_id` int(100) DEFAULT NULL,
  `event_comment` longtext DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_guests`
--

CREATE TABLE `event_guests` (
  `guest_id` int(11) NOT NULL,
  `guest_photo` varchar(400) DEFAULT NULL,
  `guest_name` varchar(400) DEFAULT NULL,
  `guest_details` varchar(400) DEFAULT NULL,
  `event_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_testimonials`
--

CREATE TABLE `event_testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `testimonial_text` longtext DEFAULT NULL,
  `event_id` int(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_testimonials`
--

INSERT INTO `event_testimonials` (`testimonial_id`, `image`, `testimonial_text`, `event_id`, `author`) VALUES
(3, 'Gautam Chopra.png', ' The workshop helped me a lot and it is crystal clear for me now how to decide my ideal law school. TLC helps you enhance your skills irrespective of whether you get into a law school or not. \r\n\r\n', 21, 'Gautam Chopra'),
(4, 'Sai Rakshita.png', 'I liked TLC a lot. They consider our work as theirs and help inconsistently. Their team not only mentors you, but gives push-ups from time to time.\r\n', 21, 'Sai Rakshita'),
(5, 'Aarsheya Singh.png', 'This program has given me the confidence for which I have been striving for the past 3 years. The manner in which Aakriti & Ashish have explained things; with all the patience and efforts, it\'s something remarkable.\r\n\r\n\r\n\r\nBy - Aarsheya Singh', 18, NULL),
(6, 'A. Anoop.png', 'It was  great to be a part of the legal research program conducted by the team TLC. The team has taught me various aspects of research which made me start researching on various topics. \r\n\r\n\r\n\r\n\r\nBy - A. Anoop', 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_thumbnails`
--

CREATE TABLE `event_thumbnails` (
  `event_thumbnail_id` int(11) NOT NULL,
  `thumbnail_image` varchar(255) DEFAULT NULL,
  `thumbnail_name` varchar(255) DEFAULT NULL,
  `event_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_thumbnails`
--

INSERT INTO `event_thumbnails` (`event_thumbnail_id`, `thumbnail_image`, `thumbnail_name`, `event_id`) VALUES
(10, 'Upcoming Event Thumbnail 1.jpeg', NULL, 22),
(11, 'Upcoming Event Thumbnail 2.jpeg', NULL, 22),
(12, 'Upcoming Event Thumbnail 3.jpeg', NULL, 22),
(13, 'Upcoming Event Thumbnail 4.jpeg', NULL, 22),
(14, 'Upcoming Event Thumbnail 5.jpeg', NULL, 22),
(15, 'Thumbnail 1_SSCorner.png', NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `fact_authors`
--

CREATE TABLE `fact_authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `author_school` varchar(255) DEFAULT NULL,
  `intresting_facts_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `intresting_facts`
--

CREATE TABLE `intresting_facts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fact` longtext DEFAULT NULL,
  `fact_author` varchar(255) DEFAULT NULL,
  `fact_image` varchar(255) DEFAULT NULL,
  `fact_author_school` varchar(255) DEFAULT NULL,
  `top_fact_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intresting_facts`
--

INSERT INTO `intresting_facts` (`id`, `title`, `fact`, `fact_author`, `fact_image`, `fact_author_school`, `top_fact_status`) VALUES
(2, 'The longest TV ad in history is 14 hours long.', 'Created by Old Spice for a product that supposedly \"lasts forever,\" the commercial features actor Terry Crews, among others, and is currently airing \"for an eternity\" online (you can watch the abridged version here). But since that\'s not exactly possible on TV, a 14-hour version was put together and aired in São Paulo, Brazil, on December 8, 2018, earning the Guinness World Record for the longest TV ad ever.', 'abcd', 'tv_ad.jpg', 'abcd', 1),
(3, '\"Girl\"  used to be the word for any young child.', 'If you use the word \"girl\" these days, you\'re likely talking about little Suzy or young Sally. But way back in the 1300s, you might have been referring to little Bobby or young Billy as well. The word \"gyrle\" (which is where we get \"girl\") was used for any child or young person, according to the Online Etymology Dictionary. For proof, Quartz points to Chaucer\'s Canterbury Tales from the late 1300s, in which he wrote: \"In daunger hadde he at his owene gyse / The yonge gerles of the diocise, / And knew hir conseil, and was al hir reed.\" Quartz explains that \"the Summoner knows all the secrets of the young people in the diocese—not just the young girls.\"', 'abcd', 'girl.jpg', 'abcd', 0),
(4, 'Bananas glow blue under UV lights', 'Bananas may be famously yellow, but according to a study published in the Journal of the German Chemical Society, the usually sunny-toned fruit actually glows an \"intense\" blue color when put under black light (or UV lights). Scientists at the University of Innsbruck in Austria and Columbia University in the U.S. found that the degradation of chlorophyll that happens in the fruit while it ripens is the cause of the funky blue glow.', 'abcd', 'banana.jpg', 'abcd', 1),
(5, 'China cloned an award-winning police dog.', 'Training a puppy isn\'t easy, which is why a police force in China is hoping to speed up the process by cloning an award-winning dog. The cloned puppy, named Kunxun, reported for duty in March 2019. She was cloned using the DNA from current police dog Huahuangma, a seven-year-old Kunming wolfdog from the Puer police station in Yunnan who is renowned for her detective skills. The agency hopes the cloned puppy is just as adept at solving crimes as her clone. If things go well with this pup, there could be plenty of other cloned canines joining the force.', 'abcd', 'police-dog.jpg', 'abcd', 1),
(6, 'The largest pizza on record was 13,580.28 square feet.', 'Most of us love pizza and have surely eaten our fair share over the years. But could you eat one that was the size of a warehouse? In 2012, Dovilio Nardi, Andrea Mannocchi, Marco Nardi, Matteo Nardi, and Matteo Giannotte from NIPfood at Fiera Roma, in Rome, Italy, created a massive pie that had a surface area of 1,261.65 square meters, according to Guinness World Records. They named their creation \"Ottavia,\" in honor of the first Roman emperor Octavian Augustus. And, yes, the pizza was gluten-free.', 'abcd', 'cornicone-on-pizza.jpg', 'abcd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_partners`
--

CREATE TABLE `media_partners` (
  `partner_id` int(11) NOT NULL,
  `partner_details` longtext DEFAULT NULL,
  `partner_image` varchar(255) DEFAULT NULL,
  `partner_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_partners`
--

INSERT INTO `media_partners` (`partner_id`, `partner_details`, `partner_image`, `partner_url`) VALUES
(5, 'LAW INFORMANTS Law Informants is an online platform for Law Students,  Researchers,  Scholars,  and Enthusiasts seeking to bring together the Legal Fraternity. They aim to act as a bridge by connecting their viewers to the opportunities present all around. They present everything there is about Law and more. Want to know more about them?', 'Collaboration_Law Informants.jpeg', 'https://lawinformants.com/');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `bio` mediumtext DEFAULT NULL,
  `facebook_link` mediumtext DEFAULT NULL,
  `twitter_link` mediumtext DEFAULT NULL,
  `linkedin_link` mediumtext DEFAULT NULL,
  `instagram_link` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `mname`, `image`, `designation`, `bio`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`) VALUES
(1, 'Uma Sharma', '6.jpg', '', 'Core Member ', '', '', ' https://www.linkedin.com/in/uma-sharma-38a4121aa', 'https://instagram.com/_.umasharma?igshid=1qz93b3n8x6ab ');

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `podcast_id` int(11) NOT NULL,
  `header` mediumtext DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `audio_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`podcast_id`, `header`, `pic`, `audio`, `details`, `audio_link`) VALUES
(6, 'Teaser : Law Student Problems!', 'bodies.jpg', '', 'Welcome to the teaser of our brand new podcast \"Let\'s Talk About\". Here, we talk about law school, problems Students face in law school and the easiest solution to those problems. We talk about life of a student in or away from home, the struggle of a student that others don\'t notice. Well, basically if you are a law student, we talk about you and your problems!', 'https://raw.githubusercontent.com/thelegalchronicle/thelegalchronicle/master/Teaser_Podcast.m4a'),
(7, ' Let’s Talk About with Aakriti || \"Art of Scoring in Exams\"', 'americanlife.png', '', 'Have you wondered how you write everything but still don\'t get marks or how you learn everything but are not able to reproduce it in your answer scripts? Go ahead and listen to the solution and if you like it, follow us on Spotify for more episodes.\r\n', 'https://raw.githubusercontent.com/thelegalchronicle/thelegalchronicle/master/Episode1_Podcast.m4a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `event_like` int(11) DEFAULT NULL,
  `event_love` int(11) DEFAULT NULL,
  `event_comment` int(255) DEFAULT NULL,
  `blog_like` int(255) DEFAULT NULL,
  `blog_comment` varchar(255) DEFAULT NULL,
  `user_host_address` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `event_like`, `event_love`, `event_comment`, `blog_like`, `blog_comment`, `user_host_address`, `ip_address`) VALUES
(2, 'meher', 'meher@gmail.com', NULL, NULL, NULL, NULL, 'meher added the comment for bolg', 'LAPTOP-6L9LJI2M', '::1'),
(4, 'meher', 'meher@gmail.com', NULL, NULL, NULL, NULL, NULL, 'LAPTOP-6L9LJI2M', '::1'),
(5, 'meher', 'meher@gmail.com', NULL, NULL, NULL, NULL, NULL, 'LAPTOP-6L9LJI2M', '::1'),
(6, 'meher', 'meher@gmail.com', NULL, NULL, NULL, NULL, NULL, 'LAPTOP-6L9LJI2M', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `subject` mediumtext DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(100) NOT NULL,
  `vname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `vthumb` varchar(255) CHARACTER SET latin1 NOT NULL,
  `vlink` varchar(255) CHARACTER SET latin1 NOT NULL,
  `vdetails` mediumtext CHARACTER SET latin1 NOT NULL,
  `event_id` int(255) DEFAULT NULL,
  `likes` int(255) DEFAULT NULL,
  `views` int(255) DEFAULT NULL,
  `vdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `vname`, `vthumb`, `vlink`, `vdetails`, `event_id`, `likes`, `views`, `vdate`) VALUES
(5, 'Day 3 - Talk on Basic Structure', 'https://i.ytimg.com/vi/dHqUng-rMSM/hqdefault.jpg', 'dHqUng-rMSM', 'The Legal Chronicle presents the third day of the talk on the Doctrine of Basic Structure of the Indian Constitution. The last session of the talk is dedicated to the dissenting opinion of the minority judges in the Keshavanda Bharti judgment and the repercussions of the Basic Structure Doctrine. If you LIKE the video, please press the bell icon and SUBSCRIBE to our channel for similar videos and talks.\r\n\r\nIf you are interested in similar talks, conferences and other legal events follow us on our social media pages from the links given below:\r\nFACEBOOK: https://www.facebook.com/tlegalchronicle/\r\nINSTAGRAM: https://www.instagram.com/thelegalchronicle/?igshid=rp0r6spb1a6k\r\nTWITTER: https://twitter.com/ChronicleLegal?s=08\r\nLINKEDIN: https://www.linkedin.com/in/legal-chronicle-1865941b1/', 12, 7, 128, NULL),
(6, 'Day 1 - Constitutional Law', 'https://i.ytimg.com/vi/EvKxpYkvmVU/hqdefault.jpg', 'EvKxpYkvmVU', 'The Legal Chronicle presents a three day talk on the Doctrine of Basic Structure from July 06 to July 08, 2020, followed by a quiz competition on the same topic (register here: https://forms.gle/U6b85K6JbBCfHSdm8) on July 10, 2020. \r\n\r\nDay 1 of the talk is about building up a background of events that led to the Keshavananda Bharti judgment - \"The case that saved Indian Democracy\". Besides, the talk reveals certain unknown or unnoticed facts about the events, knowing which makes the topic more interesting.\r\n\r\nPress the bell icon and SUBSCRIBE to our channel for the talk of the remaining 2 days and regular updates of future events.\r\n\r\nFollow us on Facebook: (https://www.facebook.com/The-Legal-Chronicle-102633888182340/)\r\n\r\nInstagram: (https://www.instagram.com/thelegalchronicle/?igshid=rp0r6spb1a6k)\r\n \r\nFor updates regarding Internship Opportunities, events, and competitions. \r\nYou can visit our website for \'slides\' showcased on this video:  https://thelegalchronicle.wixsite.com/mysite-1 for materials and reports of completed events.\r\n\r\n#constitution #basicstructure #india #palkhivala #kesavananda', 12, 7, 128, NULL),
(7, 'Day 2 - Talk on The Doctrine of Basic Structure', 'https://i.ytimg.com/vi/78AEhiyjXLU/hqdefault.jpg', '78AEhiyjXLU', 'The Legal Chronicle presents a Three-day talk on the Doctrine of Basic Structure of the Indian Constitution. This is the second video in the series of three-day talk and it deals specifically with the Keshavananda Bharti case, the arguments of Nani A. Palkhivala and H.M. Seervai in the case and the analysis of the entire majority judgment in the case. The video explains what is the doctrine of basic structure and the difference between basic features and the basic structure of the Constitution. If you like the video, do share your comments with us in the comment box and if you have any suggestions for us, then definitely share your views.\r\n\r\nPress the BELL icon and SUBSCRIBE to our channel to never miss any video, lecture, or event. You can also follow us on Facebook (https://www.facebook.com/The-Legal-Chronicle-102633888182340/) and Instagram (https://www.instagram.com/thelegalchronicle/?igshid=rp0r6spb1a6k) to receive immediate notifications about all our future events.', 12, 6, 75, NULL),
(8, 'Sandeep Maheshwari on Dr. A.P.J. Abdul Kalam', 'https://i.ytimg.com/vi/rHhtnxyrAu4/hqdefault.jpg', 'rHhtnxyrAu4', '“It is Very Easy To Defeat Someone, but it is Very Hard To Win Someone.”\r\n\r\nSandeep Maheshwari is a name among millions who struggled, failed and surged ahead in search of success, happiness and contentment. Just like any middle class guy, he too had a bunch of unclear dreams and a blurred vision of his goals in life. All he had was an undying learning attitude to hold on to. Rowing through ups and downs, it was time that taught him the true meaning of his life.\r\n\r\nTo know more, log on to www.sandeepmaheshwari.com\r\n\r\nFacebook: https://www.facebook.com/sandeepmaheshwaripage\r\nInstagram: https://www.instagram.com/sandeep__maheshwari\r\nTwitter: https://twitter.com/sandeepseminars\r\n\r\nMusic: Youtube Music Library', 12, 34097, 223457, '2020-08-18 05:39:07'),
(9, 'Sadhguru - Why People Wear Gemstones? Do Gemstones Really Work? | Mystics of India | 2018', 'https://i.ytimg.com/vi/ELm0aVWR9XI/hqdefault.jpg', 'ELm0aVWR9XI', 'As a part of the Youth and Truth Programme, Sadhguru visits IIT Bombay where he is asked a question on the belief in wearing gemstones and whether the gemstones really work or not?\r\nSadhguru clears a lot of myths about why these things are used and what kinds of effect they have on human minds. Share this video with your friends and family.\r\n\r\n\r\nIf you like this video please do share this with your friends & family members or someone who need this here is the link to the video: https://youtu.be/ELm0aVWR9XI\r\n\r\n? MORE RECOMMENDED VIDEOS FOR YOU ?\r\nIf you enjoyed this video, you may enjoy these other videos from Mystics of India\r\n\r\n• Sadhguru Debut Dubstep Song - https://youtu.be/r44PKIK1K2g\r\n• When Does A Human Being Become God - \r\n   https://youtu.be/R-M6v9wp75c\r\n• Sadhguru Reveals The Truth of Life From The Peak of Kailash - \r\n   https://youtu.be/SkfS7sDTGiM\r\n• Tomorrow Never Comes - https://goo.gl/63tfgb\r\n• Truth of Life - https://www.youtube.com/watch?v=Mkpth...\r\n• Baba Neem Karoli - https://goo.gl/bLZHLw\r\n•  MUKTI Dubstep Song - https://goo.gl/gogRJh\r\n• Sadhguru & His Guru - https://goo.gl/nGd87P\r\n \r\n? SUBSCRIBE TO OUR CHANNEL ?\r\nIf you want to learn & do great things your environment must be great & supportive. Create by subscribing to our channel: \r\nhttps://www.youtube.com/mysticsofindia\r\n\r\nFOR MORE ON SPIRITUALITY CONNECT WITH US ON:\r\nInstagram: https://www.instagram.com/mysticsofin...\r\nFacebook: https://www.facebook.com/mysticsofindia/\r\n\r\nFAIR-USE COPYRIGHT DISCLAIMER\r\n\r\n* Copyright Disclaimer Under Section 107 of the Copyright Act 1976, allowance is made for \"fair use\" for purposes such as criticism, commenting, news reporting, teaching, scholarship, and research. Fair use is a use permitted by copyright statute that might otherwise be infringing. Non-profit, educational or personal use tips the balance in favor of fair use.\r\n\r\n1)This video has no negative impact on the original works (It would actually be positive for them).\r\n2)This video is also for teaching purposes.\r\n3)It is not transformative in nature.\r\n4)I only used bits and pieces of videos to get the point across where necessary.\r\n\r\nMystics of India does not own the rights to these video clips.\r\n\r\nWe take clips from various sources to help create an atmospheric feeling that will help and inspire people in their life. \r\n\r\nThese clips and extracts are of a minimal nature and the use is not intended to interfere in any manner with their commercial exploitation of the complete work by the owners of the copyright. \r\n\r\n They have, in accordance with fair use, been repurposed with the intent of educating and inspiring others. However, if any content owners would like their images removed, please contact us by email.\r\n__________________________________________________________\r\n\r\nThank you for watching - We really appreciate it :)\r\n\r\nTEAM MOI', 12, 18195, 985328, '2018-11-10 02:40:31'),
(10, 'The Untold perks of the Research Paper workshop. See why it\'s worth 15 Days!', 'https://i.ytimg.com/vi/xv1mv_LJ28o/hqdefault.jpg', 'xv1mv_LJ28o', 'Our primary objective is to enable you to write a Research paper from credible sources. \r\nBut along with this workshop, we bring you 5 additional perks. Watch this video to find out how you can keep building your CV even when there are fewer opportunities in this lockdown.\r\nCheck our Instagram for more details:  https://www.instagram.com/thelegalchronicle/channel/\r\nRegistration link : \r\n#ResearchPaper #Workshop #legal #lawyers #lawstudents', 12, 2, 17, '2020-07-18 12:41:29'),
(11, 'Keynote (Google I/O \'18)', 'https://i.ytimg.com/vi/ogfYd705cRs/hqdefault.jpg', 'ogfYd705cRs', 'Learn about the latest product and platform innovations at Google in a Keynote led by Sundar Pichai.\r\n\r\nThis video is also subtitled in Chinese, Indonesian, Italian, Japanese, Korean, Portuguese, and Spanish.\r\n\r\nAccess Google Pay Business Console to get your Merchant ID ? https://goo.gle/2KYRrDx\r\nRate this session by signing-in on the I/O website here ? https://goo.gl/Gea8Mx\r\n10 minute recap video here ? https://goo.gl/jmCF4S\r\n\r\nGoogle I/O 2018 All Sessions Playlist ? https://goo.gl/q1Tr8x\r\nSubscribe to the Google Developers channel ? http://goo.gl/mQyv5L\r\n\r\nMusic by Terra Monk ? https://goo.gl/wPgbHP', 12, 43531, 4860445, '2018-05-09 22:11:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `event_guests`
--
ALTER TABLE `event_guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `event_testimonials`
--
ALTER TABLE `event_testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `event_thumbnails`
--
ALTER TABLE `event_thumbnails`
  ADD PRIMARY KEY (`event_thumbnail_id`);

--
-- Indexes for table `fact_authors`
--
ALTER TABLE `fact_authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `intresting_facts`
--
ALTER TABLE `intresting_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_partners`
--
ALTER TABLE `media_partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`podcast_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_guests`
--
ALTER TABLE `event_guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_testimonials`
--
ALTER TABLE `event_testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_thumbnails`
--
ALTER TABLE `event_thumbnails`
  MODIFY `event_thumbnail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fact_authors`
--
ALTER TABLE `fact_authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intresting_facts`
--
ALTER TABLE `intresting_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media_partners`
--
ALTER TABLE `media_partners`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `podcast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
