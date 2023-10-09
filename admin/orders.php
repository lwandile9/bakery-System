<main>
<h1 class="active-orders">Active orders:</h1>
<section id="orders-cintainer">

  <div class="order-card">

  <p>Order ID:<span>9</span></p>
  <p>User ID:<span>17</span></p>
  <p>Order Date:<span>2023-01-16</span></p>
  <p>Delvery Date:<span>20230-02-03 17:16pm</span></p>
  <div><p>Status: <span>Waiting-Approval</span></p>
    <label for="update-status">Update Order Status:
    <Select  name="update-status" update-order-status">
        <option></option>
        <option>Waiting-Approval</option>
        <option>Approved</option>
        <option>Out-for-Delvery</option>
        <option>Delivered</option>
    </Select>
</label>
  </div>
  <button name="submit" >Submit Update</button>
  </div>
</section>

    
</main>