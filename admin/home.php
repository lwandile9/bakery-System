<?php 
include_once"admin-dashboard.php";
require_once "../includes/dbh.inc.php";

// Count registered users
$userCount = 0;
$sqlUserCount = "SELECT COUNT(*) as totalUsers FROM tblusers";
$resultUserCount = $conn->query($sqlUserCount);

if ($resultUserCount->num_rows > 0) {
    $row = $resultUserCount->fetch_assoc();
    $userCount = $row['totalUsers'];
}

// Count total orders
$totalOrderCount = 0;
$sqlTotalOrderCount = "SELECT COUNT(*) as totalOrders FROM tblorders";
$resultTotalOrderCount = $conn->query($sqlTotalOrderCount);

if ($resultTotalOrderCount->num_rows > 0) {
    $row = $resultTotalOrderCount->fetch_assoc();
    $totalOrderCount = $row['totalOrders'];
}

// Count delivered orders
$deliveredOrderCount = 0;
$sqlDeliveredOrderCount = "SELECT COUNT(*) as deliveredOrders FROM tblorders WHERE orderStatus = 'Delivered'";
$resultDeliveredOrderCount = $conn->query($sqlDeliveredOrderCount);

if ($resultDeliveredOrderCount->num_rows > 0) {
    $row = $resultDeliveredOrderCount->fetch_assoc();
    $deliveredOrderCount = $row['deliveredOrders'];
}

// Count orders with status "Waiting-Approval"
$waitingApprovalOrderCount = 0;
$sqlWaitingApprovalOrderCount = "SELECT COUNT(*) as waitingApprovalOrders FROM tblorders WHERE orderStatus = 'Waiting-Approval'";
$resultWaitingApprovalOrderCount = $conn->query($sqlWaitingApprovalOrderCount);

if ($resultWaitingApprovalOrderCount->num_rows > 0) {
    $row = $resultWaitingApprovalOrderCount->fetch_assoc();
    $waitingApprovalOrderCount = $row['waitingApprovalOrders'];
}

$conn->close();
?>
<main>
<h1 class="active-orders">Overview</h1>

<section class="container-over-view">
    <h1>Registered Users: <?php echo $userCount; ?></h1>
    <h1>Total Orders: <?php echo $totalOrderCount; ?></h1>
    <h1>Delivered Orders: <?php echo $deliveredOrderCount; ?></h1>
    <h1>Orders Waiting for Approval: <?php echo $waitingApprovalOrderCount; ?></h1>

</section>
</main>