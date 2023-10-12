<?php
include_once "header.php";
require_once "../includes/dbh.inc.php";
require_once "../includes/functions.inc.php";

if (isset($_POST["submit"])) {
    if (!empty($_POST["orderId"])) {
       
        $id = sanitizeInput($_POST["orderId"]);

        // Fetch order status from tblorders
        $sql = "SELECT orderStatus FROM tblorders WHERE orderID = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $orderStatus = $row['orderStatus'];
        } else {
            $orderStatus = "Unknown";
        }

        $conn->close();
    } else {
        header("location:orders.php?error=invalidTracking");
        exit();
    }
} else {
    header("location:orders.php?error=invalidTracking");
    exit();
}

include_once "trackOrder.html"
?>

<script>
     // getting possible status outcomes paragraphs

    const waiting= document.getElementById('waiting-approval');
    const approved = document.getElementById('approved');
    const rejected = document.getElementById('rejected');
    const outForDelevery = document.getElementById('out-for-delevery');
    const delevered = document.getElementById('delevered');
    const orderStatus = "<?php echo $orderStatus; ?>"; // Get the order status from PHP


 

        // Apply animations or styles based on the status
        switch (orderStatus) {
            case 'waiting-approval':
                // Add animation or styles for "Waiting for approval"
                
                waiting.classList.add('currentStatus');

                break;
            case 'Approved':
                // Add animation or styles for "Approved"
                approved.classList.add('currentStatus');
                break;
            case 'Rejected':
                // Add animation or styles for "Rejected"
                rejected.classList.add('currentStatus');
                break;
            case 'Out-for-Delivery':
                // Add animation or styles for "Out for delivery"
                outForDelevery.classList.add('currentStatus');
                break;
            case 'Delivered':
                // Add animation or styles for "Delivered"
                delevered.classList.add('currentStatus');
                break;
            default:
                alert("Status Unkown!");
                break;
        }
    

</script>
