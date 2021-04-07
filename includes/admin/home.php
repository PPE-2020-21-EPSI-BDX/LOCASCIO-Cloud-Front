<?php
 
// Get user ID from current SESSION 
$userID = isset($_SESSION['loggedInUserID'])?$_SESSION['loggedInUserID']:1; 
 
$payment_id = $statusMsg = $api_error = ''; 
$ordStatus = 'danger'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){ 
     
    // Retrieve stripe token and user info from the submitted form data 
    $token  = $_POST['stripeToken'];
    $price = $_POST['price']; 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
     
    // Plan info 
    $planID = 5;
    $planName = "Abonnement #1"; 
    $planPrice = $price; 
    $planInterval = 'month'; 
     
    // Include Stripe PHP library 
    require_once 'stripe-php-master/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey('sk_test_51IccnyHHq6fdZswDsYveqpC1mdSFBZCw8JtfkaNFPNBBHQckFKuuDQM9sixJoT2tmACOEUHxWg3eBygswi2jlWW100tZFp99Os'); 
     
    // Add customer to stripe 
    try {  
        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $token 
        )); 
    }catch(Exception $e) {  
        $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $customer){  
     
        // Convert price to cents 
        $priceCents = round($planPrice*100); 
     
        // Create a plan 
        try { 
            $plan = \Stripe\Plan::create(array( 
                "product" => [ 
                    "name" => $planName 
                ], 
                "amount" => $priceCents, 
                "currency" => 'EUR', 
                "interval" => $planInterval, 
                "interval_count" => 12
            )); 
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        } 
         
        if(empty($api_error) && $plan){ 
            // Creates a new subscription 
            try { 
                $subscription = \Stripe\Subscription::create(array( 
                    "customer" => $customer->id, 
                    "items" => array( 
                        array( 
                            "plan" => $plan->id, 
                        ), 
                    ), 
                )); 
            }catch(Exception $e) { 
                $api_error = $e->getMessage(); 
            } 
             
            if(empty($api_error) && $subscription){ 
                // Retrieve subscription data 
                $subsData = $subscription->jsonSerialize(); 
         
                // Check whether the subscription activation is successful 
                if($subsData['status'] == 'active'){ 
                    // Subscription info 
                    $subscrID = $subsData['id']; 
                    $custID = $subsData['customer']; 
                    $planID = $subsData['plan']['id']; 
                    $planAmount = ($subsData['plan']['amount']/100); 
                    $planCurrency = $subsData['plan']['currency']; 
                    $planinterval = $subsData['plan']['interval']; 
                    $planIntervalCount = $subsData['plan']['interval_count']; 
                    $created = date("Y-m-d H:i:s", $subsData['created']); 
                    $current_period_start = date("Y-m-d H:i:s", $subsData['current_period_start']); 
                    $current_period_end = date("Y-m-d H:i:s", $subsData['current_period_end']); 
                    $status = $subsData['status']; 
                     
                    // Include database connection file  
                    // include_once 'dbConnect.php'; 
         
                    // // Insert transaction data into the database 
                    // $sql = "INSERT INTO user_subscriptions(user_id,stripe_subscription_id,stripe_customer_id,stripe_plan_id,plan_amount,plan_amount_currency,plan_interval,plan_interval_count,payer_email,created,plan_period_start,plan_period_end,status) VALUES('".$userID."','".$subscrID."','".$custID."','".$planID."','".$planAmount."','".$planCurrency."','".$planinterval."','".$planIntervalCount."','".$email."','".$created."','".$current_period_start."','".$current_period_end."','".$status."')"; 
                    // $insert = $db->query($sql);  
                      
                    // // Update subscription id in the users table  
                    // if($insert && !empty($userID)){  
                    //     $subscription_id = $db->insert_id;  
                    //     $update = $db->query("UPDATE users SET subscription_id = {$subscription_id} WHERE id = {$userID}");  
                    // } 
                     
                    $ordStatus = 'success'; 
                    $statusMsg = 'Your Subscription Payment has been Successful!'; 
                }else{ 
                    $statusMsg = "Subscription activation failed!"; 
                } 
            }else{ 
                $statusMsg = "Subscription creation failed! ".$api_error; 
            } 
        }else{ 
            $statusMsg = "Plan creation failed! ".$api_error; 
        } 
    }else{  
        $statusMsg = "Invalid card details! $api_error";  
    } 
}else{ 
    $statusMsg = "Error on form submission, please try again."; 
} 
?>

<div class="container">
    <div class="row">
        <div class="card xLarge-12 large-12 medium-12 small-12 xSmall-12">
            <div class="card-header">
                <h5 class="card-title">Voici un cadre</h5>
            </div>
            <div class="card-body">
                <div class="form">
                    <div class="row">
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <input type="text" placeholder="maki33000" disabled>
                            </div>
                        </div>
                        <div class="xLarge-3 large-3 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <input type="text" placeholder="maki33000">
                            </div>
                        </div>
                        <div class="xLarge-3 large-3 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <input type="text" placeholder="maki33000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-radius btn-default">Sauvegarder</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card xLarge-8 large-8 medium-12 small-12 xSmall-12">
            <div class="card-header">
                <h2 style="margin-top: 6px;">Payer un abonnement</h2>
            </div>
            <div class="card-body">
                <div id="paymentResponse" class="alert alert-<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></div>
                <?php if(!empty($subscrID)){ ?>
                    <h4>Payment Information</h4>
                    <p><b>Transaction ID:</b> <?php echo $subscrID; ?></p>
                    <p><b>Amount:</b> <?php echo $planAmount.' '.$planCurrency; ?></p>
                    
                    <h4>Subscription Information</h4>
                    <p><b>Plan Name:</b> <?php echo $planName; ?></p>
                    <p><b>Amount:</b> <?php echo $planPrice.' EUR'; ?></p>
                    <p><b>Plan Interval:</b> <?php echo $planInterval; ?></p>
                    <p><b>Period Start:</b> <?php echo $current_period_start; ?></p>
                    <p><b>Period End:</b> <?php echo $current_period_end; ?></p>
                    <p><b>Status:</b> <?php echo $status; ?></p>
                <?php } ?>
                <form action="/PPE/admin" method="post" id="paymentFrm" class="form">
                    <div class="row">
                        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>Prix de l'abonnement</label>
                                <input type="number" step=".01" name="price" placeholder="18.00">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="name" placeholder="Jean-paul">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="jeanpaul@site.fr">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>CARD NUMBER</label>
                                <div id="card_number" class="field"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>EXPIRY DATE</label>
                                <div id="card_expiry" class="field"></div>
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="form-group">
                                <label>CVC CODE</label>
                                <div id="card_cvc" class="field"></div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-radius btn-default" value="Payer" />
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>