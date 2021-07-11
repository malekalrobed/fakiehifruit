/*global $, confirm*/
$(function () {

	'use strict';
    
    //hide And show sidebar and minus the container
    $('#btn-aside').click(function () {
        
        
        $('#main-aside').toggleClass('hide-aside');
        if($('#main-aside').hasClass('hide-aside')){
           $('.wrap-container').removeClass('custom-class');
        }else {
           $('.wrap-container').addClass('custom-class');
        }
        
    });
    // Dashboard Page
    $('.toggle-info').click(function () {
        $(this).toggleClass('selected').parent().next('.panel-body').slideToggle(200);
        if ($(this).hasClass('selected')) {
            $(this).html('<i class="fa fa-minus fa-lg"></i>');
        } else {
            $(this).html('<i class="fa fa-plus fa-lg"></i>');
        }
    });
    // End Dashboard Page
    
    
    // Triger SelectBox
    // $(".select1").selectBoxIt({
    //     // Uses the Twitter Bootstrap theme for the drop down
    //     theme: "bootstrap",
    //     autoWidth: false,
    //     // Uses the jQuery 'fadeIn' effect when opening the drop down
    //     showEffect: "fadeIn",
    //     // Sets the jQuery 'fadeIn' effect speed to 400 milleseconds
    //     showEffectSpeed: 400,
    //     // Uses the jQuery 'fadeOut' effect when closing the drop down
    //     hideEffect: "fadeOut",
    //     // Sets the jQuery 'fadeOut' effect speed to 400 milleseconds
    //     hideEffectSpeed: 400
    // });
    
    $(".select2").select2({
        placeholder: 'Select The Data',
        showFirstOption:false,
        multiSelect: true
    });
   



    // Trigger Nice Scroll
    /*
    $("body, .nice-scroll").niceScroll({
        cursorcolor: '#337ab7',
        cursorwidth: '5px',
        cursorborder: '1px solid #337ab7',
        zindex: '90',
        scrollspeed: '100',
        cursorborderradius: '0'
    });
    */
    
	// Hide Placeholder On Form Focus

	$('[placeholder]').focus(function () {
		$(this).attr('data-text', $(this).attr('placeholder'));
		$(this).attr('placeholder', ' ');
	}).blur(function () {
		$(this).attr('placeholder', $(this).attr('data-text'));
	});

	// Add Asterisk On Requir Fild

	$('input').each(function () {
		if ($(this).attr('required')) {
			$(this).after('<span class="asterisk">*</span>');
		}
	});


	// Convert Password Field To Text Field On Hover Icon Eye

	var passfield = $('.password');
	$('.show-pass').hover(function () {
		passfield.attr('type', 'text');
	}, function () {
		passfield.attr('type', 'password');
	});

	// Confirmation Message On Button Delete
    $('.confirm').click(function () {
		return confirm('Are You Sure ?');
	});
    
    // Resived The Data From class send-data-to-form And To Form of Action
    $('.btn-sender').click(function () {
        // Send Information To Form action
        $('.modal-footer #form-delete').attr('action', $(this).attr('data-sender'));
        // Send Information To lable text 
        $('.lable-user-name').text($(this).attr('data-name'));
        
        $('#Modal-view .lable-id').text($(this).attr('data-sender'));
        
        //
    });
    
    // Category View Option
    
    $('.cat h3').click(function () {
        $(this).next('.full-view').slideToggle(500);
    });
    
    $('.option span').click(function () {
        $(this).addClass('active').siblings('span').removeClass('active');
        if ($(this).data('view') === 'full') {
            $('.cat .full-view').slideDown(500);
        } else {
            $('.cat .full-view').slideUp(500);
        }
    });
    
    // Show Form Search
    $('.show-frm-search').click(function () {
       $('.frm-search1').slideToggle();
       $('.frm-search2').slideToggle();
    });
    
    // Add And Remove Class to Sort Data
    $('.table>thead>tr>th').click(function () {
        $(this).addClass('sort').siblings().removeClass('sort');
        $(this).toggleClass('sort2');
    });
    
    $('ul>.nav nav-tabs li').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    
    
    // Get Value from input file to input secondery
    $("#attachment").change(function () {
       $('#uploadFile').val($(this).val()); 
    });
    
    // Save All Data In Table Add Marks
    $('#btn-save-marks').click(function () {
        $('.btn-save-mark').click();
    });
    // Reset All Data In Table Add Marks
    $('#btn-reset-marks').click(function () {
        $('.btn-reset-mark').click();
    });
    
    // Execute Query when value chang of selectbox
    $(".goquery").change(function(){
		$('#submit').click();
	});
    
    // Start Mailings Page
   
    // End Mailings Page
    
    // Data edit from Marks Page
    $('#data-edit').click(function () {
       $('.input-hidden').toggleClass('hidden').next('span').toggleClass('hidden');
       if($('.input-hidden').hasClass('hidden')){
            $(this).html('<i class="fa fa-edit"></i> تعديل الدرجات');
       }else{
            $(this).html('<i class="fa fa-close"></i> إلغاء التعديل');
       }
    });        
         
     
    // Select All CheckBox When check control in header table
    $('tr td #select-all').click(function () {
       $('tr td .state-attend').click();        
    });    
    
    
});
// function to Show And hide User Image Or Student Image on click the small image in table
function openImg(imgName) {
    var i, x;
    x = document.getElementsByClassName("picture");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(imgName).style.display = "block";
    setTimeout(function () { document.getElementById(imgName).style.display = "none"; }, 5000);
}

function searchItem2() {
  // Declare variables 
  var input, filter, table, tr, td1, td2, i;
  input = document.getElementById("inputSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("main-table");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    if (td1 || td2) {
      if (td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function searchItem5() {
  // Declare variables 
  var input, filter, table, tr, td1, td2, td3, td4, td5, i;
  input = document.getElementById("inputSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("main-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    td3 = tr[i].getElementsByTagName("td")[3];
    td4 = tr[i].getElementsByTagName("td")[4];
    td5 = tr[i].getElementsByTagName("td")[5];
    if (td1 || td2 || td3 || td4 || td5) {
      if (td1.innerHTML.toUpperCase().indexOf(filter) > -1
          || td2.innerHTML.toUpperCase().indexOf(filter) > -1
          || td3.innerHTML.toUpperCase().indexOf(filter) > -1
          || td4.innerHTML.toUpperCase().indexOf(filter) > -1
          || td5.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

// Sort Data in Table

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("main-table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if(Number(x.innerHTML) > 0){  /* check if the leater is number */
        if (dir == "asc") {
          if (Number(x.innerHTML) > Number(y.innerHTML)) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (Number(x.innerHTML) < Number(y.innerHTML)) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        }
      } else {  /* else the leater is not number */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        }
      }
    } // End For
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount === 0 && dir === "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

// About US IN Footer
function aboutUS(state) {
    if(state == 1) {
        document.getElementById("about-us").style.display = "block";
    }else {
        document.getElementById("about-us").style.display = "none";
    }
}