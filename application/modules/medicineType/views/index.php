<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3 d-flex justify-content-between">
            <div class="text-center">
                <h4>Type List</h4>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMedicineTypeModal">Add Type</button>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        foreach ($data as $key => $value) {
                            echo '<tr>';
                            echo '<th scope="row">' . ($key + 1) . '</th>';
                            echo '<td>' . $value->type . '</td>';
                            echo '<td>' . $value->status_type . '</td>';
                            echo '<td>                            
                                        <div class="form-check form-switch mb-3 float-start">
                                            <input class="form-check-input" type="checkbox" value="' . $value->status . '" onchange="isActive(this, ' . $value->id . ')" ' . ($value->status == 1 ? 'checked' : '') . '>
                                        </div>
                                        <button type="button" onclick="editMedicineType(' . $value->id . ')" class="btn btn-primary">Edit</button>
                                        <button type="button" onclick="deleteFn(' . $value->id . ', \'medicine_type\', \'medicineType\', \'medicineType/delete\')" class="btn btn-danger">Delete</button>

                                    </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td> <button class="btn btn-primary">Edit</button> <button class="btn btn-danger">Delete</button></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="addMedicineTypeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMedicineTypeModal_title">Add Medicine Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMedicineTypeForm">
                    <input type="hidden" name="e_id" id="e_id">
                    <div class="form-check form-switch mb-3 float-end">
                        <input class="form-check-input" type="checkbox" value="1" onchange="isActive(this)" name="active_button" id="active_button" checked>
                        <label class="form-check-label" for="active_button" id="active_label">Active</label>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" id="type">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="addMedicineType()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>


<script>
    const baseurl = "<?= base_url() ?>";
</script>
<script src="<?= base_url() ?>assets/custom/js/medicineType/medicineType.js"></script>
<script src="<?= base_url() ?>assets/custom/js/global.js"></script>