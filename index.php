<?php
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="show.php" method="post" class="border p-4 rounded">
                <h2 class="mb-4">Registration</h2>
                
                <div class="form-group mb-3">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>

                <div class="form-group mb-3">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>

                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" name="country" required>
                        <option value="">Select Country</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                        <option value="canada">Canada</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Gender</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="male" name="gender" value="male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Skills</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="php" name="skills[]" value="php">
                        <label class="form-check-label" for="php">PHP</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="mysql" name="skills[]" value="mysql">
                        <label class="form-check-label" for="mysql">MySQL</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="j2se" name="skills[]" value="j2se">
                        <label class="form-check-label" for="j2se">J2SE</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="postgresql" name="skills[]" value="postgresql">
                        <label class="form-check-label" for="postgresql">PostgreSQL</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group mb-3">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" name="department" value="OpenSource" readonly>
                </div>

                <div class="form-group mb-3">
                    <label>Verification Code: Sh68Sa</label>
                    <input type="text" class="form-control" name="verificationCode" required>
                    <small class="form-text text-muted">Please insert the code in the box below</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
