
<body>
  <main id="home-page" class="container-fluid">
    <div class="row">
      <div class="col-sm-6" id="left-column">
        <div>
          <div class="jumbotron" style="text-align: center; background-color: #d1ecfb">
            <img src="assets/images/bird-background.png" width="40%" />
            <h1 style="font-family: 'Chewy', cursive; font-size: 400%; color: gray">The Bird</h1>
            <h4 style="font-family: 'Chewy', cursive; font-size: 200%; color: gray">
              Where birds of a feather flock together.
            </h4>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="row" style="padding: 10px; border-bottom: 1px solid lightgrey">
          <form method="POST" action="index.php?action=user_login" id="signin" style="float: left">

              <input type="hidden" name="formSubmitted" value="sign_in">
            <div class="form-group col-md-3" style="float: left">
              <h2 style="margin: 0 15px; font-family: 'Chewy', cursive; font-size: 200%; color: gray; clear: both">
                Sign In
              </h2>
            </div>

            <div class="form-group col-md-3" style="float: left">
              <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" />
            </div>

            <div class="form-group col-md-3" style="float: left">
              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" />
            </div>

            <button type="submit" class="btn btn-primary" style="margin-bottom: 25px">Sign In</button>
          </form>
        </div>


        <div class="row" style="padding: 25px">
          <h2 style="font-family: 'Chewy', cursive; font-size: 200%; color: gray">Or Sign Up</h2>

          <form method="post" enctype="multipart/form-data" action="<?php echo ROOT_DIR.'index.php?action=user_registration' ?>">
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" placeholder="First name" name="fname" />
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Last name" name="lname" />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4"></label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email_one" />
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4"></label>
                <input
                  type="email"
                  class="form-control"
                  id="inputEmail4"
                  placeholder="Confirm Email"
                  name="email_two"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4"></label>
                <input
                  type="password"
                  name="password_one"
                  class="form-control"
                  id="inputPassword4"
                  placeholder="Password"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4"></label>
                <input
                  type="password"
                  name="password_two"
                  class="form-control"
                  id="inputPassword4"
                  placeholder="Confirm Password"
                />
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress"></label>
              <input
                type="text"
                class="form-control"
                id="inputAddress"
                placeholder="Complete Street Address, e.g. 1234 Main St, Apt. 4"
                name="address"
              />
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity"></label>
                <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" />
              </div>
              <div class="form-group col-md-4">
                <label for="inputState"></label>
                <input type="text" class="form-control" id="inputState" name="state" placeholder="State" />
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip"></label>
                <input type="text" class="form-control" id="inputZip" name="zip" placeholder="Zip Code" />
              </div>
              <br />
              <div class="form-group col-md-6">
                &nbsp;
                <label style="color: #007bff; font-weight: 700">Upload profile photo</label>
                <input type="file" class="form-control" name="my_image" />
              </div>
            </div>

            <button type="submit" class="btn btn-primary" >Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </main>


</body>
