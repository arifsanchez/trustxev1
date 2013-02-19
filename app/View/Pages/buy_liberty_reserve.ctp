<style type="text/css">
#tabs_wrapper {
    width: 422px;
}
#tabs_container {
    border-bottom: 1px solid #ccc;
}
#tabs {
    list-style: none;
    padding: 5px 0 4px 0;
    margin: 0 0 0 10px;
    font: 0.75em arial;
}
#tabs li {
    display: inline;
}
#tabs li a {
    border: 1px solid #ccc;
    padding: 4px 6px;
    text-decoration: none;
    background-color: #eeeeee;
    border-bottom: none;
    outline: none;
    border-radius: 5px 5px 0 0;
    -moz-border-radius: 5px 5px 0 0;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
}
#tabs li a:hover {
    background-color: #dddddd;
    padding: 4px 6px;
}
#tabs li.active a {
    border-bottom: 1px solid #fff;
    background-color: #fff;
    padding: 4px 6px 5px 6px;
    border-bottom: none;
}
#tabs li.active a:hover {
    background-color: #eeeeee;
    padding: 4px 6px 5px 6px;
    border-bottom: none;
}
 
#tabs li a.icon_accept {
    background-image: url(accept.png);
    background-position: 5px;
    background-repeat: no-repeat;
    padding-left: 24px;
}
#tabs li a.icon_accept:hover {
    padding-left: 24px;
}
 
#tabs_content_container {
    border: 1px solid #ccc;
    border-top: none;
    padding: 10px;
    
}
.tab_content {
    display: none;
}
#tabs-container {
	padding-top:20px;
	}
</style>
<script>
$(document).ready(function(){
    //  When user clicks on tab, this code will be executed
    $("#tabs li").click(function() {
        //  First remove class "active" from currently active tab
        $("#tabs li").removeClass('active');
 
        //  Now add class "active" to the selected/clicked tab
        $(this).addClass("active");
 
        //  Hide all tab content
        $(".tab_content").hide();
 
        //  Here we get the href value of the selected tab
        var selected_tab = $(this).find("a").attr("href");
 
        //  Show the selected tab content
        $(selected_tab).fadeIn();
 
        //  At the end, we add return false so that the click on the link is not executed
        return false;
    });
});
</script>

<div id="contact_main">
	<div class="sidebar">
	  <ul>        
	  <li><a href="#"><img src="../img/contactus/buyliberty.png"></a></li> 
          <li><a href="#"><img src="../img/contactus/sellliberty.png"></a></li> 
	  <li><a href="#"><img src="../img/contactus/csl.png"></a></li> 
	  </ul>	
	</div>
	<div id="wrap_main">
		<h1>Buy Liberty reserve</h1>

			<ol>
			<li> Register with our website and log in with your new username and password. </li>
			Once logged in, select the BUY option from the menu on the left .
			<li> Select your method of money transfer - either with Western Union or a bank to bank wire transfer - as well as your e-currency account (from one of our three providers) and account number (this is where your e-currency will be when processed). </li>
			<li>In both cases, a confirmation email will be sent directly to you. </li>
			<li>
			At all times you can track your orders with your 6-digit BUY ORDER ID number, given to you after submitting your request.
			<br>
			</li>
			<li>
			*
			<b>Please note that and fees incurred from your home bank (or any intermediary bank) while making a wire transfer are not accounted for in SwiftExchanger's fees. Our low fees are not optional and must be sent with your Western Union order or Wire Transfer. </b>
			</li>
			</ol>
			
			<div id="tabs-container">
				<div id="tabs_container">
				<ul id="tabs">
					<li class="active"><a href="#tab1">Western Union</a></li>
					<li><a href="#tab3">Wire Transfer</a></li>
				</ul>
				</div>
						<div id="tabs_content_container">
    <div id="tab1" class="tab_content" style="display: block;">
        <p>Submit your order on our website. When your order is sent you will receive a contact name. You will send your money (+fees) to this contact at your nearest Western Union office. Your Western Union office will provide you with a MTCN (Money Transfer Control Number). Return to our website and log in and click the BUY option once again. You will see your pending order, waiting to be activated. Enter your MTCN code to activate your order. Your e-currency account will show your funds shortly. </p>
    </div>
    <div id="tab3" class="tab_content">
        <p>Submit your order on our website. Once confirmed you will receive account information of our bank, to whom you will wire the money directly from your home bank account. Once processed, your funds will be deposited into your e-currency account. </p>
    </div>
	</div>
	</div>
	
			
	</div>	
</div> 
