<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include_once dirname(__FILE__).'/inc/config.php';

$q1 = app_db()->select('select * from session');

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function($)
{ 	 
	function create_html_table (tbl_data)
	{
		//--->create data table > start
		var tbl = '';
		tbl +='<table class="table table-hover tbl_code_with_mark">'

			//--->create table header > start
			tbl +='<thead>';
				tbl +='<tr>';
				tbl +='<th>Formation Name</th>';
				tbl +='<th>Formation Date</th>';
				tbl +='<th>Formation Hour</th>';
				tbl +='<th>Lien</th>';
				tbl +='<th>Image</th>';
				tbl +='<th>Options</th>';
				tbl +='</tr>';
			tbl +='</thead>';
			//--->create table header > end
			
			//--->create table body > start
			tbl +='<tbody>';

				//--->create table body rows > start
				$.each(tbl_data, function(index, val) 
				{
					//you can replace with your database row id
					var row_id = val['row_id'];

					//loop through ajax row data
					tbl +='<tr row_id="'+row_id+'">';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="fname">'+val['fname']+'</div></td>';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="fdate">'+val['fdate']+'</div></td>';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="fhour">'+val['fhour']+'</div></td>';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="fhref">'+val['fhref']+'</div></td>';
						tbl +='<td ><div class="row_data" edit_type="click" col_name="fimg">'+val['fimg']+'</div></td>';

						//--->edit options > start
						tbl +='<td>';						 
							tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Modifier</a> </span>';
							//only show this button if edit button is clicked
							tbl +='<a href="#" class="btn_save btn btn-link"  row_id="'+row_id+'"> Enregistrer </a>';
							tbl +='<a href="#" class="btn_cancel btn btn-link" row_id="'+row_id+'"> Annuler </a>';
							tbl +='<a href="#" class="btn_delete btn btn-link1 text-danger" row_id="'+row_id+'"> Supprimer</a>';
						tbl +='</td>';
						//--->edit options > end						
					tbl +='</tr>';
				});
				//--->create table body rows > end
			tbl +='</tbody>';
			//--->create table body > end

		tbl +='</table>';
		//--->create data table > end

		//add new table row
		tbl +='<div class="text-center">';
			tbl +='<span class="btn btn-primary btn_new_row">Ajouter une Nouvelle Session</span>';
		tbl +='<div>';

		//out put table data
		$(document).find('.tbl_user_data').html(tbl);

		$(document).find('.btn_save').hide();
		$(document).find('.btn_cancel').hide(); 	
		$(document).find('.btn_delete').hide(); 
			
	}


	var ajax_url = "<?php echo APPURL;?>/ajax.php" ;
	var ajax_data = <?php echo json_encode($q1);?>;

	//create table on page load
	//create_html_table(ajax_data);

	//--->create table via ajax call > start
	$.getJSON(ajax_url,{call_type:'get'},function(data) 
	{
		create_html_table(data);
	});
	//--->create table via ajax call > end
	



	//--->make div editable > start
	$(document).on('click', '.row_data', function(event) 
	{
		event.preventDefault(); 

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//make div editable
		$(this).closest('div').attr('contenteditable', 'true');
		//add bg css
		$(this).addClass('bg-warning').css('padding','5px');

		$(this).focus();

		$(this).attr('original_entry', $(this).html());

	})	
	//--->make div editable > end

	//--->save single field data > start
	$(document).on('focusout', '.row_data', function(event) 
	{
		event.preventDefault();

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//get the original entry
		var original_entry = $(this).attr('original_entry');

		var row_id = $(this).closest('tr').attr('row_id'); 
		
		var row_div = $(this)				
		.removeClass('bg-warning') //add bg css
		.css('padding','')

		var col_name = row_div.attr('col_name'); 
		var col_val = row_div.html(); 
		
		var arr = {};
		//get the col name and value
		arr[col_name] = col_val; 
		//get row id value
		arr['row_id'] = row_id;

		if(original_entry != col_val)
		{ 
			//remove the attr so that new entry can take place
			$(this).removeAttr('original_entry');

			//ajax api json data			 
			var data_obj = 
			{
				row_id: row_id,
				col_name: col_name,
				col_val:col_val,
				call_type: 'single_entry',				
			};
			
			//call ajax api to update the database record
			$.post(ajax_url, data_obj, function(data) 
			{
				var d1 = JSON.parse(data);
				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to update your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					var msg = ''
					+ '<h3>Successfully updated your entry</h3>'
					+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
			});
		}
		else
		{
			$('.post_msg').html('');
		}
		
	})	
	//--->save single field data > end

	//--->button > edit > start	
	$(document).on('click', '.btn_edit', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').show();
		tbl_row.find('.btn_cancel').show();
		tbl_row.find('.btn_delete').show();

		//hide edit button
		tbl_row.find('.btn_edit').hide(); 

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('contenteditable', 'true')
		.attr('edit_type', 'button')
		.addClass('bg-warning')
		.css('padding','3px')

		//--->add the original entry > start
		tbl_row.find('.row_data').each(function(index, val) 
		{  
			//this will help in case user decided to click on cancel button
			$(this).attr('original_entry', $(this).html());
		}); 		
		//--->add the original entry > end

	});
	//--->button > edit > end


	//--->button > cancel > start	
	$(document).on('click', '.btn_cancel', function(event) 
	{
		event.preventDefault();

		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();
		tbl_row.find('.btn_delete').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		tbl_row.find('.row_data').each(function(index, val) 
		{   
			$(this).html( $(this).attr('original_entry') ); 
		});  
	});
	//--->button > cancel > end

	
	//--->save whole row entery > start	
	$(document).on('click', '.btn_save', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		
		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();
		tbl_row.find('.btn_delete').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();


		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		//--->get row data > start
		var arr = {}; 
		tbl_row.find('.row_data').each(function(index, val) 
		{   
			var col_name = $(this).attr('col_name');  
			var col_val  =  $(this).html();
			arr[col_name] = col_val;
		});
		//--->get row data > end

		//get row id value
		arr['row_id'] = row_id;

		//out put to show
		$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>');

		//add call type for ajax call
		arr['call_type'] = 'row_entry';

		//call ajax api to update the database record
		$.post(ajax_url, arr, function(data) 
		{
			var d1 = JSON.parse(data);
			if(d1.status == "error")
			{
				var msg = ''
				+ '<h3>There was an error while trying to update your entry</h3>'
				+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}
			else if(d1.status == "success")
			{
				var msg = ''
				+ '<h3>Successfully updated your entry</h3>'
				+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}			
		});
	});
	//--->save whole row entery > end



	$(document).on('click', '.btn_new_row', function(event) 
	{
		event.preventDefault();
		//create a random id
		var row_id = Math.random().toString(36).substr(2);

		//get table rows
		var tbl_row = $(document).find('.tbl_code_with_mark').find('tr');	 
		var tbl = '';
		tbl +='<tr row_id="'+row_id+'">';
			tbl +='<td ><div class="new_row_data fname bg-warning" contenteditable="true" edit_type="click" col_name="fname"></div></td>';
			tbl +='<td ><div class="new_row_data fdate bg-warning" contenteditable="true" edit_type="click" col_name="fdate"></div></td>';
			tbl +='<td ><div class="new_row_data fhour bg-warning" contenteditable="true" edit_type="click" col_name="fhour"></div></td>';
			tbl +='<td ><div class="new_row_data fhref bg-warning" contenteditable="true" edit_type="click" col_name="fhref"></div></td>';
			tbl +='<td ><div class="new_row_data fimg bg-warning" contenteditable="true" edit_type="click" col_name="fimg"></div></td>';

			//--->edit options > start
			tbl +='<td>';			 
				//tbl +='  <a href="#" class="btn btn-link btn_new" row_id="'+row_id+'" > Add Entry</a>   | ';
				tbl +='  <a href="#" class="btn btn-link btn_remove_new_entry" row_id="'+row_id+'"> Retirer</a> ';
			tbl +='</td>';
			//--->edit options > end	

		tbl +='</tr>';
		tbl_row.last().after(tbl);

		$(document).find('.tbl_code_with_mark').find('tr').last().find('.fname').focus();
	});

	
	$(document).on('click', '.btn_remove_new_entry', function(event) 
	{
		event.preventDefault();

		$(this).closest('tr').remove();
	});

	function alert_msg (msg)
	{
		return '<span class="alert_msg text-danger">'+msg+'</span>';
	}

	$(document).on('click', '.btn_new', function(event) 
	{
		event.preventDefault();
		
		var ele_this = $(this);
		var ele = ele_this.closest('tr');
		
		//remove all old alerts
		ele.find('.alert_msg').remove();

		//get row id
		var row_id = $(this).attr('row_id');

		//get field names
		var fname = ele.find('.fname');
		var fdate = ele.find('.fdate');
		var fhour = ele.find('.fhour');
		var fhref = ele.find('.fhref');
		var fimg = ele.find('.fimg');


		if(fname.html() == "")
		{
			fname.focus();
			fname.after(alert_msg('Entrez le Nom de Formation'));
		}
		else if(fdate.html() == "")
		{
			fdate.focus();
			fdate.after(alert_msg('Entrez la Date de Formations'));
		}
		else if(fhour.html() == "")
		{
			fhour.focus();
			fhour.after(alert_msg('Entrez Heure de Formation'));
		}
		else if(fhref.html() == "")
		{
			fhref.focus();
			fhref.after(alert_msg('Enter Le Lien de Formation'));
    }
    else if(fimg.html() == "")
		{
			fimg.focus();
			fimg.after(alert_msg('Enter Le Lien de Formation'));
		}
		else
		{
			var data_obj=
			{
				call_type:'new_row_entry',
				row_id:row_id,
				fname:fname.html(),
				fdate:fdate.html(),
				fhour:fhour.html(),
				fhref:fhref.html(),
				fimg:fimg.html(),
			};	
			
			ele_this.html('<p class="bg-warning">Please wait....adding your new row</p>');

			$.post(ajax_url, data_obj, function(data) 
			{
				var d1 = JSON.parse(data);

				var tbl = '';
				tbl +='<a href="#" class="btn btn-link btn_edit" row_id="'+row_id+'" > Edit</a>';
				tbl +='<a href="#" class="btn btn-link btn_save"  row_id="'+row_id+'" style="display:none;"> Save</a>';
				tbl +='<a href="#" class="btn btn-link btn_cancel" row_id="'+row_id+'" style="display:none;"> Cancel</a>';
				tbl +='<a href="#" class="btn btn-link text-warning btn_delete" row_id="'+row_id+'" style="display:none;" > Delete</a>';

				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to add your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					ele_this.closest('td').html(tbl);
					ele.find('.new_row_data').removeClass('bg-warning');
					ele.find('.new_row_data').toggleClass('new_row_data row_data');
				}
			});
		}
	});



	$(document).on('click', '.btn_delete', function(event) 
	{
		event.preventDefault();

		var ele_this = $(this);
		var row_id = ele_this.attr('row_id');
		var data_obj=
		{
			call_type:'delete_row_entry',
			row_id:row_id,
		};	
		 		 
		ele_this.html('<p class="bg-warning">Please wait....deleting your entry</p>')
		$.post(ajax_url, data_obj, function(data) 
		{ 
			var d1 = JSON.parse(data); 
			if(d1.status == "error")
			{
				var msg = ''
				+ '<h3>There was an error while trying to add your entry</h3>'
				+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}
			else if(d1.status == "success")
			{
				ele_this.closest('tr').css('background','red').slideUp('slow');				 
			}
		});
	});
 
	
});
</script>






<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Costum CSS -->
  <link rel="stylesheet" type="text/css" href="../css/custom.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>Accueil | Geni Soft Ecole</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body id="top">

  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark my-bg-color fixed-top " id="mainNav">

    <!-- Start Container -->
    <div class="container">

      <!-- Nav Brand -->
      <a id="logo" href="indexAdmin.php" class="navbar-brand js-scroll-trigger text-white">Geni Soft Ecole</a>
      <!-- the class navbar-brand gives the logo of our web page -->
      <!-- <a id="logo-no-bg" href="index.html"><img src="img\GS-logo-removebg-preview"></a> -->

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation"><i class="fa fa-bars"></i>
        <!-- data-target uses JQuery so when we're calling something like a target we need to put the # for the JQuery -->
        <span class="navbar-toggle-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- ml-auto stands for margine left auto  -->
          <!-- we'll use the id in our JS -->

          <!-- ACCUEIL -->
          <li class="nav-item">
            <a href="indexAdmin.php" class="nav-link js-scroll-trigger">Accueil</a>
          </li>

          <!-- NOS FORMATIONS -->
          <li class="nav-item dropdown">
            <!-- dropdown-toggle -->
            <!-- id="navDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
             
            <a href="formationsAdmin.php" class="nav-link  js-scroll-trigger">Nos Formations</a>
          </li>

          <!-- NOS OFFRES -->
          <li class="nav-item">
            <a href="" class="nav-link js-scroll-trigger">Nos Offres</a>
          </li>

          <!-- CONTACT -->
          <li class="nav-item">
            <a href="" class="nav-link js-scroll-trigger">Contact</a>
          </li>

          <!-- RECHERCHE -->
          <!--<li class="nav-item">
            <i class="fa fa-search btn ml-2 mt-1 btn-lg"><a href="https://www.geni-soft.com"></a></i>
          </li>-->

           <li class="nav-item">
             <a href="logout.php" class="btn btn-link" style="color: rgba(255,255,255,.6);">Logout</a>
           </li>
        </ul>
      </div>
    </div>
    <!-- End Container -->
  </nav>
  <!-- End Navigation -->


  </div>
  <!-- End Container -->

  <div style="padding:10px;"></div>
	
	<div class="container">
	
		<div style="padding:20px;"></div>
	
		<div class="panel panel-default">
		<div class="panel-heading"><h3> Ajouter, Modifier et Supprimer les Sessions </h3> </div><br>
	
		<div class="panel-body">
			
			<div class="tbl_user_data"></div>
	
		</div>
	
		</div>

    <br>

  <!-- Start Marketing Section Icons -->
  <h2>L'affichage des sessions</h2>
    <br>

      <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=gsef;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }


        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT fname, fdate, fhour, fhref, fimg FROM session');
       
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        echo      '<div class="row">';

        while ($donnees = $reponse->fetch())
        {
          echo        '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">';
          echo          '<figure class="figure">';
          echo            '<img id="prochainesession" src="../img/' . htmlspecialchars($donnees['fimg']) . '.jpg" alt="' . htmlspecialchars($donnees['fname']) . '" class="figure-img img-fluid">';
          echo          '</figure>';
          echo          '<div class="text-center">';
          echo            '<h4 class="nv-session">' . htmlspecialchars($donnees['fname']) . '</h4>';
          echo            '<h6> Nouvelle session ' . htmlspecialchars($donnees['fname']) . ' est programmé le ' . htmlspecialchars($donnees['fdate']) . ' à ' . htmlspecialchars($donnees['fhour']) . '.</h6>';
          echo           '<br>';
          echo            '<button class="btn my-bg-color text-white"><a style="color:white;" href="../formations/' . htmlspecialchars($donnees['fhref']) . '.html">Savoir Plus</a></button>';
          echo          '</div>';
          echo        '</div>';
        }
        echo    '</div>';
        $reponse->closeCursor();
    ?>
    
    </div>

    <!-- End Start Marketing Section Icons -->
  </div>


  <br><br><br><br>

   <!-- Footer -->
   <footer class="py-5 my-bg-color text-center">
    <div class="container">

      <div class="btn-group btn-group-lg">
        <a class="btn btn-secondary" href="https://www.geni-soft.com" target="blank"><i class="fa fa-globe"></i></a>
        <a class="btn btn-dark" href="https://web.facebook.com/GeniSoftInformatique/?ref=br_rs" target="blank"><i class="fa fa-facebook"></i></a>
        <a class="btn btn-secondary" href="https://www.linkedin.com/company/geni-soft-informatique" target="blank"><i class="fa fa-linkedin"></i></a>
        <a class="btn btn-dark" href="contact.html"><i class="fa fa-phone"></i></a>
        <a class="btn btn-secondary" href="contact.html"><i class="fa fa-envelope-o"></i></a>
      </div>

      <br><br><br>
      <p class="m-0 text-center text-white">Geni Soft Ecole - Copyright &copy; 2020 Tous droits réservés</p>

    </div>

  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <script src="js/navbar-shrinker.js"></script>


    <!-- <a href="reset-password.php" class="btn btn-primary">Reset Your Password</a> -->

</body>

</html>
          