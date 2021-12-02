<?php $this->layout('master', ['title' => 'Register']) ?>
<style>
    /* div for floating login */
    .square {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        border-radius: 10px;
    }

    .content {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    body {
        background-image: linear-gradient(180deg, white, powderblue);

    }
</style>
<!-- register -->
<div class="square">
    <div class="content ">
        <div class="login-header">
            <h3>Register</h3>
            <p>Please enter your information to complete registration.</p>
        </div>
        <form class="mt-5" action="/register" method="POST">
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="User name">
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
            </div>
            <input type="submit" class="btn btn-outline-success" value="Register">
        </form>
    </div>
</div>