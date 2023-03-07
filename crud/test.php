<!--addmodal -->
<div class="modal fade" id="experienceAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add experience</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveexperience">
            <div class="modal-body">

                <div id="errorMessage1" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">experience</label>
                    <input type="text" name="experience" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">company</label>
                    <input type="text" name="company" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Start year</label>
                    <input type="number" name="startyear" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">End year</label>
                    <input type="number" name="endyear" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save experience</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="experienceEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit experience</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateexperience">
            <div class="modal-body">

                <div id="errorMessageUpdate1" class="alert alert-warning d-none"></div>

                <input type="text" name="experience_id" id="experience_id" >

                <div class="mb-3">
                    <label for="">experience</label>
                    <input type="text" name="experience" id="experience" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">company</label>
                    <input type="text" name="company" id="company" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Start Year</label>
                    <input type="number" name="startyear" id="startyear1" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">End Year</label>
                    <input type="number" name="endyear" id="endyear1" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update experience</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="experienceViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View experience</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">experience</label>
                    <p id="view_experience" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">company</label>
                    <p id="view_company" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">startyear</label>
                    <p id="view_startyear1" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">endyear</label>
                    <p id="view_endyear1" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="card-body">

                    <table id="myTable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>experience</th>
                                <th>company</th>
                                <th>startyear</th>
                                <th>endyear</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          $user_id=3;
                            $stmt = $con->query("SELECT * FROM experiences where user_id='3'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $experience)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $experience['experience'] ?></td>
                                        <td><?= $experience['company'] ?></td>
                                        <td><?= $experience['startyear'] ?></td>
                                        <td><?= $experience['endyear'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$experience['id_experience'];?>" class="viewexperienceBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$experience['id_experience'];?>" class="editexperienceBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$experience['id_experience'];?>" class="deleteexperienceBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 col-4 mx-auto my-4">
                    <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#experienceAddModal">
                            Add experience
                        </button>
                    </div>
                </div>
