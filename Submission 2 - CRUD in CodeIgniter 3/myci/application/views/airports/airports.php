<div class="container mt-5">
    <h1 class="text-left">Add New Airport</h1>

    <div class="row mt-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
            Add New
        </button>
    </div>
  </div>
</div>
<div class="container-fluid mt-5" style="overflow:auto; height:600px;">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">cityCode</th>
        <th scope="col">cityName</th>
        <th scope="col">countryName</th>
        <th scope="col">countryCode</th>
        <th scope="col">timezone</th>
        <th scope="col">lat</th>
        <th scope="col">lon</th>
        <th scope="col">numAirports</th>
        <th scope="col">city</th>
        <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($airports as $row) : ?>
            <tr>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['cityCode']; ?></td>
                <td><?php echo $row['cityName']; ?></td>
                <td><?php echo $row['countryName']; ?></td>
                <td><?php echo $row['countryCode']; ?></td>
                <td><?php echo $row['timezone']; ?></td>
                <td><?php echo $row['lat']; ?></td>
                <td><?php echo $row['lon']; ?></td>
                <td><?php echo $row['numAirports']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td colspan="2">
                    <a href="" class="badge badge-info ml-4 mr-3">Edit</a>
                    <a href="<?= base_url('airports/delete/'.$row['code']); ?>" class="badge badge-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Add Airport</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= base_url('airports/add'); ?>" method="POST">
        <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="code">code</label>
                <input type="text" class="form-control" id="code" name="code">
            </div>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="cityCode">cityCode</label>
                <input type="text" class="form-control" id="cityCode" name="cityCode">
            </div>
            <div class="form-group">
                <label for="cityName">cityName</label>
                <input type="text" class="form-control" id="cityName" name="cityName">
            </div>
            <div class="form-group">
                <label for="countryName">countryName</label>
                <input type="text" class="form-control" id="countryName" name="countryName">
            </div>
            <div class="form-group">
                <label for="countryCode">countryCode</label>
                <input type="text" class="form-control" id="countryCode" name="countryCode">
            </div>
            <div class="form-group">
                <label for="timezone">timezone</label>
                <input type="text" class="form-control" id="timezone" name="timezone">
            </div>
            <div class="form-group">
                <label for="lat">lat</label>
                <input type="text" class="form-control" id="lat" name="lat">
            </div>
            <div class="form-group">
                <label for="lon">lon</label>
                <input type="text" class="form-control" id="lon" name="lon">
            </div>
            <div class="form-group">
                <label for="numAirports">numAirports</label>
                <input type="number" class="form-control" id="numAirports" name="numAirports">
            </div>
            <div class="form-group">
                <label for="city">city</label>
                <select class="form-control" id="city" name="city">
                <option value="true">True</option>
                <option value="false">False</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>