<!DOCTYPE html>
<html lang="en">
<?php include 'fetch_contracts.php'; ?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DASHBOARD</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />

  <!-- <link rel="stylesheet" href="style2.css"> -->

  <link rel="stylesheet" href="style2.css?v=<?php echo time(); ?>">
  
</head>
<body>
  <div class="container">
    <aside>
          <div class="top">
            <div class="logo"> 
              <img src="https://cracku.in/latest-govt-jobs/wp-content/uploads/2020/02/aai-logo.png" alt="">
              <h2>Airports Authority Of<br>
                India</h2>
            </div>
            <div class="close" id ="close-btn">
              <span class = "material-symbols-outlined">close</span>
            </div>
          </div>
          <div class="sidebar">
            <a href="#"  class="active">
              <span class="material-symbols-sharp">
                grid_view
                </span>
                <h3>Dashboard</h3>
            </a>
            <a href="https://www.aai.aero/" target="_blank">
              <span class="material-symbols-sharp">
                grid_view
                </span>
                <h3>About Us</h3>
            </a>
            <a href="logout.php">
              <span class="material-symbols-sharp">
                logout
                </span>
                <h3>Logout</h3>
            </a>
          </div>
    </aside>

    <!----------------------------END OF ASIDE-------------------------------->
   <main>
    <?php include 'tempdb.php'; ?>
    <h1>Dashboard</h1>
    <div class="insights">
      <div class="orders">
        <span class="material-symbols-outlined">analytics</span>
        <div class="middle">
          <div class="left">
            <h3>Total Contracts</h3>
            <h1><?php echo $totalorders; ?></h1>
          </div>
        </div>
      </div>
      <!------------------------END OF TOTAL ORDERS-------------------->
      <div class="revenue">
        <span class="material-symbols-outlined">bar_chart</span>
        <div class="middle">
          <div class="left">
            <h3>Revenue Expenditure Contracts</h3>
            <h1><?php echo $totalRevenueExpenditureContracts; ?></h1>
          </div>
        </div>
      </div>
      <!-----------------------END OF REVENUE EXPENDITURE-------------->
      <div class="capital">
        <span class="material-symbols-outlined">bar_chart</span>
        <div class="middle">
          <div class="left">
            <h3>Capital Expenditure Contracts</h3>
            <h1><?php echo $totalCapitalExpenditureContracts; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="recent-orders">
      <h2>Recent Orders</h2>
      <table>
        <thead>
          <tr>
            <th>Contract ID</th>
            <th>Contract name</th>
            <th>Contract Status</th>
            <th>Contract Type</th>
            <th>Contract Start Date</th>
            <th>Contract End Date</th>
            <th>Description</th>

          </tr>
        </thead>
        
        <tbody>
    <?php include 'dbdash.php'; ?>
        </tbody>

      </table>
      <!-- <a href="#">Show All</a> -->
    </div>
   </main>

   <!----------------------------------------END OF MAIN///SIDE START------------------------->
  <div class="right">
    <div class="top">
      <button type="menu" id="menu-btn">
      <span class="material-symbols-outlined">
        menu
        </span>
      </button>
      <div class="theme-toggler">
        <span class="material-symbols-outlined active">light_mode</span>
        <span class="material-symbols-outlined">dark_mode</span>
      </div>
      <div class="profile">
        <div class="info">
          <p>Hey, <b>User</b></p>
          <small class="text-muted">Admin</small>
        </div>
      </div>
    </div>
    <!------------------------------------------END OF TOP----------------------------------->
  </div>

  <div class="btn-add-product">
    <button id="add-product">Add Contract</button>
  </div>
  <div class="popup">
    <div class="close-btn">&times;</div>
    <form action="adddbcon.php" method="POST">
      <h2>Add Contract</h2>
      <div class="form">
          <div class="form-element">
              <span class="details">Contract ID</span>
              <input type="text" name="contractid" placeholder="Contract ID" required>
          </div>
          <div class="form-element">
              <span class="details">Contract Name</span>
              <input type="text" name="contractname"  placeholder="Contract Name" required>
          </div>
          <div class="form-element">
              <span class="details">Status</span>
                  <div class="select-box">
                    <select name="status">Status
                      <option value="Active">Active</option>
                      <option value="Dead">Dead</option>
                    </select>
                  </div>
          </div>
          <div class="form-element">
              <span class="details">Contract Type</span>
              <div class="select-box">
                <select name="contracttype">Contract Type
                    <option value="Revenue Expenditure">Revenue Expenditure</option>
                    <option value="Capital Expenditure">Capital Expenditure</option>
                </select>   
              </div>
          </div>
          <div class="form-element">
              <span class="details">Start Date</span>
              <input type="date" placeholder="Start Date" name="startdate"required>
          </div>
          <div class="form-element">
              <span class="details">End Date</span>
              <input type="date" placeholder="End Date" name="enddate" required>
          </div>
          <div class="form-element">
              <span class="details">Description</span>
              <input type="text" placeholder="Description" name="description" required>
          </div>
          <div class="form-element">
            <button class="submit" name="submit">Submit</button>
          </div>
      </div>
    </form>
  </div>

  
  
  <script src="index2.js"></script>
  <script>
  // Function to filter the contracts based on their types
  function filterContracts(contractType) {
    const rows = document.querySelectorAll('.recent-orders tbody tr');
    rows.forEach((row) => {
      const typeCell = row.querySelector('td:nth-child(4)');
      const isVisible = contractType === 'all' || typeCell.textContent.trim().toLowerCase() === contractType;
      row.style.display = isVisible ? 'table-row' : 'none';
    });
  }


  
  // Event listeners for the filter buttons
  document.getElementById('filter-all').addEventListener('click', () => filterContracts('all'));
  document.getElementById('filter-revenue').addEventListener('click', () => filterContracts('revenue expenditure'));
  document.getElementById('filter-capital').addEventListener('click', () => filterContracts('capital expenditure'));
</script>
</body>
</html>
