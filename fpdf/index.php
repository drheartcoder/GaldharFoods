<?php
require('fpdf.php');

session_start();
if(isset($_SESSION['uname']) && ($_SESSION['pass']))
{
	include"../dbconnect.php";
	$xusername = $_SESSION['uname'];
	
	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
			// Logo
			$this->Image('hrrdclogo.JPG',15,20,20);
			// Move to the right
			//$this->Cell(80);
			// Arial bold 15
			$this->SetFont('Times','B',12);
			// Title	
			$this->Text(40,20,'Human Resource Research & Development Centre');
			// Line break
			//$this->Ln(10);
			
			$this->SetFont('Times','B',11);
			$this->Text(40,28,'102, Suyash Appartment, Above Dr.Hemlata Patil Clinic, Near Play Ground');
			$this->Text(40,32,'Mahatma Nagar, Nashik – 422007     Contact:+918007963010');
			$this->Text(40,36,'e-mail: hrrdcnsk@gmail.com    Web: www.hrrdc.com');
			
			//Display Date and Time
			//$time_now=mktime(date('h')+5,date('i')+30,date('s'));
			//$date = date('d-m-Y H:i', $time_now);
			//$this->SetFont('Arial','',10);
			//$this->Text(140,36,"Date Time : $date");
			
			//Draw Line
			$this->Line(0,42,2010,42);
		}
		
		// Page footer
		function Footer()
		{
			$this->Line(0,254,2010,254);
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Page number
			//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			
			$this->SetFont('Times','',11);
			$this->Text(20,260,'Industrial Level');
			$this->Text(20,264,'Organisation Diagnosis');
			$this->Text(20,268,'Managerial Skills');
			$this->Text(20,272,'Soft Skills');
			$this->Text(20,276,'All HR Activities');
			
			$this->Text(75,260,'College Level');
			$this->Text(75,264,'Career Path');
			$this->Text(75,268,'Soft Skills');
			$this->Text(75,272,'Personality test & Development');
			$this->Text(75,276,'Entrepreneurship Development');
			
			$this->Text(140,260,'School Level');
			$this->Text(140,264,'Study Test');
			$this->Text(140,268,'Aptitude test');
			$this->Text(140,272,'Quality Education Survey');
			
			$this->Text(20,280,'Correspondence Courses: Career Counseling, Entrepreneurship Development, Supervisory Development');
			
		}
	}
	
	
	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);
	//for($i=1;$i<=40;$i++)
	
		$noofqus = '158';
		$name = 'ABC';
		$education = 'B.Com';
		$contact = '9876543210' ;
	
		$cogn_result =  55.3;
		$cogn_fix_rem = "Cognitive ability is the ability of person to grasp whatever is happening in the surrounding. It is an important ability which deals with ability of person to learn different things, remembering various things and recalling them. This ability needed for every kind of education. It deals with acquiring knowledge in depth; hence it defines the higher level of education you can go for. With higher level in this ability it is recommended to go for more complex vocation.";
		$cogn_result_rem = "Your score in cognitive ability is average. To improve it further you need to express your options and verify it. To think more deeply about the subject matter will help you further. We will suggest you to improve your consciousness and start expressing the thoughts coming in your mind";
		
		$reas_result =  31.6;
		$reas_fix_rem = "Reasoning ability deals with basic reason finding.  During our life we need to find reasons for different activities. Finding the right reason is critical skill. This ability helps you to know your skill in this area. Reasoning ability is very helpful in different areas of career stating from diagnosing the arts to strategy formulation in corporate. This is critical and equally important ability to make career at higher level and maintain the position. It becomes important part for making decision in medical field for diagnosis.";
		$reas_result_rem = "Your score in the Reasoning ability is low. You need to improve your ability by improving options to know proper reasons. We suggest you need to be more alert about the feedback and positively think about them. Concentrate on basic part of subject so that the understanding will be easy and so will be the reason finding.";
		
		$spec_result =  61.8;
		$spec_fix_rem = "Spatial Ability is the ability of person to arrange the space around him to make it more accessible and comfortable. This is an important ability in the fields where space is the major concern of the business This include the technical fields like Architect, Civil, Mechanical, Automobile etc. It is also an important consideration in design aspects in other engineering fields like PCB design, landscape design, space, automation and control etc. It is also an important ability in the fields like travel, tourism, fine arts, film, photography event organiser, market related planning etc. It is also an important ability in noble professions like doctors.";
		$spec_result_rem = "Your score in spacial ability is good. We suggest some regular exercises with some efforts by improved ways i.e. with direction, space, limitations & opportunities. Try finding location with maps, travelling; space arrangements will help to further enhance the ability.";
	
		$verb_result =  54.1;
		$verb_fix_rem = "This ability deals with ability to use proper words & communicate effectively. This ability is the major tool where you need to choose the field where you will be in constant touch with people and need to speak. Verbal ability is an important ability in the career fields like sales, Training, media, social welfare, counseling, public speaking, Teaching, mass communication, doctors etc.";
		$verb_result_rem = "Your score in verbal ability is average. You can have good communication with others. However to improve the influence you need to improve in terms of your vocabulary. To improve your ability you need to do exercises with words newly known to you. Read more with understanding meaning of words & sentences. Use new words in conversation";
	
	
		$socl_result =  63.8;
		$socl_fix_rem = "This ability is the presentation of your ability to be part of the society. As the name suggest it is the major tool in the field where the person needs to have social contacts and maintain them. These fields include social welfare, sales, various associations, NGOs, etc. The careers like politics, Insurance, media etc also demand such qualities. Apart from this for every career where you need to be part of the working team demand these qualities";
		$socl_result_rem = "Your score in the social ability is good. The score suggest you can maintain the relation to fair level. You need to involve into people more. Improving the involvement without entering his circle of influence is the skills you need to develop further. You need to learn the assertiveness further to get best out of your relations. Also learning certain communication skills, presentation skills, & leadership skills will help you in long term.";
	
	
		$nume_result =  29.4;
		$nume_fix_rem = "Numerical ability is the ability to solve numerical problems. One can easily note that this is an important ability for the person who is entering into the career where the numerical problem solving is involved. It is said that a good engineer must be a good mathematician. Thus all engineering and technology field demands this skill. Also the fields like statistics, maths, physics, biotechnology, Niño technology, Space science, research demands this skill.";
		$nume_result_rem = "Your score in the numerical ability is low. You can improve your numerical ability by solving theory based numericals.You may have problems with stating the numerical properly. We suggest you to recheck the numerical values before finalizing your decisions. We suggest you to practice various intelligence mathematical problems to practice to improve the ability.";
		
		$nume_mem_result =  71.9;
		$nume_mem_fix_rem = "Numerical memory is the ability of person to remember the numbers. It is an important ability in commerce, finance, economics, statistics, geographical plans etc. As you go up in the ladder of any organisation you need to keep watch on numbers. Hence this becomes powerful tool at higher level in the organisation. Certain technological fields also demand this skill.";
		$nume_mem_result_rem = "Your score in numerical memory is good. We suggest you to improve it further by using the numbers like contact, height, weight, Blood pressure, distances, vehicle numbers, account numbers, account balance, profit, loss etc. during your day today conversation. Sharpen your skill by solving the accounting and economic problems.";
		
		$fig_mem_result =  66.7;
		$fig_mem_fix_rem = "Figural memory is the ability of person to remember the figures. This is an important ability for the fields like medical as well as engineers. Figures or pictures plays an import part in other fields like photography, geography, marine sciences, anatomy, botany, veterinary, sculpture, fine arts, film development, photo mixing, stage decoration, etc. Strategic m to understand and predict the trends.";
		$fig_mem_result_rem = "Your score in figural memory is good. You can enhance it further by noting minute things like curves,dots,lines etc. Also for remembering the photos you need to remember the colors and their patterns. Identifying the color shades will help more.";
		
		$know_result =  52.2;
		$know_fix_rem = "Knowledge is the way the acquired proficiency or information is used in the life. Acquiring information will not be helpful until person apply it for the career. All those fields where person need to start on his own after the education needs to have this critical ability. This includes professional fields like lawman, CS, Consultants etc.";
		$know_result_rem = "Your score in knowledge category is average. You need to work on clarifying the concepts further to make it sharp and focused. We suggest you to work in this direction & make clear distinction in your thoughts. Slow but steady efforts in this direction can bring you the rewards.";
		
		$practical_result =  52.2;
		$practical_fix_rem = "Practical skill shows wish to operate than to talk or read. The person having higher score in this area is supposed to choose the career where the practical behavior is dominating. This includes career like diploma, ITI like course in Engineering field. It may be nursing, home science, naturotherapy, yoga etc.These people can be good entrepreneurers.";
		$practical_result_rem = "Your score in practical skill is average.We suggest you to devide the work before you start working on it. Make sures the parts will club together to for the total task. You need to start managing the work than just doing it.";
		
		$soc_skill_result =  59.3;
		$soc_skill_fix_rem = "It is the ability of person to get the things needed from the society.This is an important skill not only for career but for the life. You need to deal with people to get your requirements fulfilled from them. To get what you need and till keeping the people happy is critical skill. This is an important skill where you need to deal with people like sales, consulting, leadership position, management, administration etc.";
		$soc_skill_result_rem = "Your social skills are average.To inhance it further check your personality aspects toinfluence people by accepting your personality. Be bold, be firm about your opinion.";
		
		$assert_result =  65.9;
		$assert_fix_rem = "Assertiveness is ability of person to push him selves in the competitive situation.  This deals with the facing difficulties with strong mind. This is an important ability to progress in competitive environment. The higher the score the more the person can enjoy in the competitive environment.";
		$assert_result_rem = "Your score in the assertiveness is good. To improve it further learns to force you up to the level of best satisfaction of work. Always desire best quality out of yourselves and the people from whom you get it. Learn assertiveness techniques and make best out of it.";
		
		$faith_result =  69.4;
		$faith_fix_rem = "Faith is power for a person to do the things by getting strong imaginary or actual support. The self motivation is largely depends on faith. Beliefs and their by behavior is guided by the faith.";
		$faith_result_rem = "Your score in faith is good. You can enhance faith power by winning trust of peoples in close relation and then go further. The more your trust the more you will be getting in return. You may fail to get it in return, but have patience. Your consistent efforts with positive attitude will bring the fruits.";
		
		$lineno = 50;
		
		$pdf->SetFont('Times','',16);
		$pdf->Text(20,50,'HRRDC APTITUDE TEST RESULTS');
		
		$result="select * from userlogin";
		$rows = mysql_query($result); 
		while($row=mysql_fetch_array($rows, MYSQL_ASSOC))
		{
			$pdf->SetFont('Arial','',10);
			
			$pdf->Text(20,60,'Total number of questions :');	
			$pdf->Text(80,60,"{$row['noofquestions']}");
			$pdf->Text(110,60,"Name :");
			$pdf->Text(140,60,ucwords("{$row['first_name']} {$row['last_name']}"));
			
			$pdf->Text(20,64,'Number of solved questions :');	
			$pdf->Text(80,64,"{$row['lastquestion']}");
			$pdf->Text(110,64,"Education :");
			$pdf->Text(140,64,"{$row['education']}");
			
			$pdf->Text(20,68,'Number of unsolved questions :');	
			$pdf->Text(80,68,"{$row['noofquestions']}"-"{$row['lastquestion']}");
			$pdf->Text(110,68,"Contact :");
			$pdf->Text(140,68,"{$row['mobile']}");
			
			$pdf->Text(110,72,"Admission Date :");
			$pdf->Text(140,72,"{$row['admdate']}");
		}
			
		$pdf->SetFont('Arial','B',10);
		$pdf->Text(20,76,'Graphical Results:');
		
		$pdf->Text(80,80,'Your Score');
		$pdf->Text(120,80,'Average Score');
		$pdf->Text(160,80,'Total Score');
		
		$linegap = 9;
		$lineno = 84;
		//Table Header
		$pdf->Text(20,$lineno,'Abilities');	
		$pdf->SetFont('Arial','',10);
		
		$lineno = $lineno+$linegap;
		//Table Body
		$pdf->Text(20,$lineno,'Cognitive Ability');	
		$pdf->Text(85,$lineno,'62');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Reasoning Ability');
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Spatial Ability');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Verbal Ability');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Social Ability');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Numerical Ability');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Numerical Memory');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Figural Memory');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->SetFont('Arial','B',10);
		$pdf->Text(20,$lineno,'Inclination');
		
		$pdf->SetFont('Arial','',10);
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Knowledge');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Practical Skills');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Social Skill');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Assertiveness');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$lineno = $lineno+$linegap;
		$pdf->Text(20,$lineno,'Faith');	
		$pdf->Text(85,$lineno,'31.4');
		$pdf->Text(130,$lineno,'60');
		$pdf->Text(165,$lineno,'100');
		
		$pdf->AddPage();
		$lineno = 50;
		$pdf->SetFont('Arial','',10);
		$pdf->Text(20,50,'Introvert');
		$pdf->SetY(46);
		$pdf->SetX(50);
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Text(110,50,'Extrovert');
		
		$pdf->Text(20,60,'Unorganised');
		$pdf->SetY(56);
		$pdf->SetX(50);
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Text(110,60,'Organised');
		
		$pdf->Text(20,70,'Leader ');
		$pdf->SetY(66);
		$pdf->SetX(50);
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Text(110,70,'Follower');
		
		$pdf->Text(20,80,'Manages Time');
		$pdf->SetY(76);
		$pdf->SetX(50);
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Cell(5,5,'',1,0,'C');
		$pdf->Text(110,80,'Could not manage time');
		
		$pdf->SetFont('Arial','B',10);
		$pdf->Text(20,90,'Score Details:');
		$pdf->SetFont('Arial','',10);
		
		//Cognitive Ability  ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,95,'Cognitive Ability');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(91);
		$pdf->SetX(80);
		$pdf->Text(66,95,'Score %');
		$pdf->Cell(15,5,$cogn_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$cogn_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $cogn_result_rem );
		
		
		//Reasoning Ability  ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,140,'Reasoning Ability');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(136);
		$pdf->SetX(80);
		$pdf->Text(66,140,'Score %');
		$pdf->Cell(15,5,$reas_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$reas_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $reas_result_rem );
		
		//Spatial Ability  ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,195,'Spatial Ability');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(191);
		$pdf->SetX(80);
		$pdf->Text(66,195,'Score %');
		$pdf->Cell(15,5,$spec_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$spec_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $spec_result_rem );
	
		
		$pdf->AddPage();
		
		//Verbal Ability ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,50,'Verbal Ability');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(46);
		$pdf->SetX(80);
		$pdf->Text(66,50,'Score %');
		$pdf->Cell(15,5,$verb_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$verb_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $verb_result_rem );
	
		//Social Ability ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,97,'Social Ability');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(93);
		$pdf->SetX(80);
		$pdf->Text(66,97,'Score %');
		$pdf->Cell(15,5,$socl_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$socl_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $socl_result_rem );
	
		//Numerical Ability ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,148,'Numerical Ability');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(144);
		$pdf->SetX(80);
		$pdf->Text(66,148,'Score %');
		$pdf->Cell(15,5,$nume_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$nume_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $nume_result_rem );
		
		//Numerical Memory ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,196,'Numerical Memory');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(192);
		$pdf->SetX(80);
		$pdf->Text(66,196,'Score %');
		$pdf->Cell(15,5,$nume_mem_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$nume_mem_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $nume_mem_result_rem );
		
		$pdf->AddPage();
		
		//Figural Memory ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,50,'Figural Memory');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(46);
		$pdf->SetX(80);
		$pdf->Text(66,50,'Score %');
		$pdf->Cell(15,5,$fig_mem_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$fig_mem_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $fig_mem_result_rem );
		
		//Knowledge ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,90,'Knowledge');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(86);
		$pdf->SetX(80);
		$pdf->Text(66,90,'Score %');
		$pdf->Cell(15,5,$know_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$know_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $know_result_rem );
		
		//Practical ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,128,'Practical');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(124);
		$pdf->SetX(80);
		$pdf->Text(66,128,'Score %');
		$pdf->Cell(15,5,$practical_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$practical_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $practical_result_rem );
		
		//Social Skill ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,164,'Social Skill');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(160);
		$pdf->SetX(80);
		$pdf->Text(66,164,'Score %');
		$pdf->Cell(15,5,$soc_skill_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$soc_skill_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $soc_skill_result_rem );
		
		//Assertiveness ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,204,'Assertiveness');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(200);
		$pdf->SetX(80);
		$pdf->Text(66,204,'Score %');
		$pdf->Cell(15,5,$assert_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$assert_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $assert_result_rem );
		
		$pdf->AddPage();
		
		//Faith ************************************************************************
		$pdf->SetFont('Arial','BU',9);
		$pdf->Text(20,50,'Faith');
		$pdf->SetFont('Arial','',9);
		$pdf->SetY(46);
		$pdf->SetX(80);
		$pdf->Text(66,50,'Score %');
		$pdf->Cell(15,5,$faith_result,1,0,'C');
		
		$pdf->Ln();
		$pdf->SetX(19);
		$pdf->MultiCell(180,5,$faith_fix_rem );
	
		$pdf->Ln(1);
		$pdf->SetX(19);
		$pdf->MultiCell(180,5, $faith_result_rem );
		
		$pdf->SetFont('Arial','B',9);
		$pdf->Text(20,85,'Next Five Year Review Template :');
		
		$pdf->SetFont('Arial','',9);
		$pdf->Text(20,94,'1. Status after complition of FIRST year from the test conducted (DD/MM/YYYY)');
		
		$pdf->Text(20,124,'2. Status after complition of SECOND year from the test conducted (DD/MM/YYYY)');
		
		$pdf->Text(20,154,'3. Status after complition of THIRD year from the test conducted (DD/MM/YYYY)');
		
		$pdf->Text(20,184,'4. Status after complition of FOURTH year from the test conducted (DD/MM/YYYY)');
		
		$pdf->Text(20,214,'5. Status after complition of FIFTH year from the test conducted (DD/MM/YYYY)');
	
		$pdf->Output();
}
else
{
	header("location:../login.php");
}
?>