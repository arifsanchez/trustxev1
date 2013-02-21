<h1> BUY ORDER : # <?php echo $id ?> </h1>

<p>Dear <?php echo $user['User']['firstname'] ?>,</p>
$email->viewVars(array('account' =>$account,'product'=>$product,'payment_to'=>$payment_to,
										'payment_from'=>$payment_from,'price'=>$price,
										));
										
<p>Thank you for your order. Below you will find all the information regarding your order </p>
<p>Account : <?php echo $account?></p>
<p>Amount+Fees : <?php echo $price?></p>
<p>Method of payment : From (Your payment channel)<?php echo $payment_from ?> To (TrustXe ) <?php echo $payment_to ?></p>
<p>Currency : <?php echo $product ?></p>

<p>------------------------------------------------------</p>

<h3>Here is our information for processing your order.</h3>

<p>Local Exchanger</P>
	 <div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="/img/ambrosia/maybank.png" width="120">
		</a>
		<div class="media-body">
			<h4 class="media-heading">Maybank </h4>
			<br>Bank Name : Maybank
			<br> Account Name : IK Worlwide Solution 
			<br>Account Number : 5147 6710 7326 
		</div>
	</div>
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="/img/ambrosia/cimb.png" width="120">
		</a>
		<div class="media-body">
			<h4 class="media-heading">CIMB Bank </h4>
			<br> Bank Name : CIMB Bank
			<br>	Account Name :IK Worlwide Solution  
			<br>Account Number : 1447-0000475-10-7
		 </div>
	</div>
	
	

<p>International Exchanger</P>			
<table class="table table-bordered" >
	<tr>
		<th colspan="2">
			<img width="85" height="30" align="right" alt="EURO" src="/img/ambrosia/us.gif" >
			$USD Dollar - Wire Transfer Bank Account
		</th>
	</tr>
	<tr >
		<td>Bank Name:</td>
		<td>Westpac Banking Corporation</td>
	</tr>
	<tr>
		<td >Bank Address:</td>
		<td>264 Church St, Parramatta, NSW, 2150, Australia</td>
	</tr>
	<tr>
		<td >SWIFT Code:</td>
		<td>WPACAU2SXXX
			Swiftcode uses S for Sierra for Sydney </td>
	</tr>
	<tr >
		<td >Account Number:</td>
		<td>034702 289721</td>
	</tr>
	<tr>
		<td>Account Name:</td>
		<td>Technocash Limited</td>
	</tr>
	<tr >
		<td>Technocash Address:</td>
		<td>70 Pitt St, Sydney, NSW, 2000, Australia</td>
	</tr>
	<tr >
		<td>Reference</td>
		<td>AT46HP + member reference for IK Worldwide Solutions</td>
	</tr>
								
</table>


<p>------------------------------------------------------</p>



<p>If you have any order related questions, please contact us at support@trustxe.com and provide the Order ID :<?php echo $id ?> </p>


<p>Thank you for your business.</p>

<a href="www.trustxe.com"> www.trustxe.com</a>
	
