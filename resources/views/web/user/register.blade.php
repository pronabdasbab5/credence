  @extends('web.templet.master')

  {{-- @include('web.include.seo') --}}

  @section('seo')
    <meta name="description" content="Credence">
  @endsection

  @section('content')
    <!-- JTV Home Slider -->
    <section class="main-container col1-layout product-login">
        <div class="main container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="margin: auto;">
              <div class="account-login register-login">
                  <fieldset class="col2-set">
                      <div class="new-users"><strong>Register</strong>
                          <div class="content">
                            <p>If you don't have an account with us, please register in.</p>

                            <form action="http://assamproducts.webinfotechghy.xyz/registration" autocomplete="off">
                              <ul class="form-list">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="name">Name <span class="required">*</span></label>
                                            <br>
                                            <input type="text" name="name" value="" class="input-text required-entry" required="">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="email">Email Address <span class="required">*</span></label>
                                            <br>
                                            <input type="email" class="input-text required-entry" value="" name="email" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email">Phone Number <span class="required">*</span></label>
                                            <br>
                                            <input type="number" class="input-text required-entry" value="" name="contact_no">

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pass">Password <span class="required">*</span></label>
                                            <br>
                                            <input type="password" class="input-text required-entry validate-password" name="password" required="">

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="pass">Confirm Password <span class="required">*</span></label>
                                            <br>
                                            <input type="password" title="Confirm Password" name="confirm_password" class="input-text required-entry validate-password">
                                        </div>
                                    </div>
                                </li>
                              </ul>
                              <p class="required">* Required Fields</p>
                              <div class="buttons-set">
                                  <button id="send2" name="send" type="submit" class="button login"><span>Register Account</span></button>
                              </div>
                            </form>
                            <hr>
                            <p>If you have an account with us, please log in.</p>
                            <a class="button login " href="{{route('web.user.login')}}">LOGIN TO ACCOUNT</a>
                            </div>
                      </div>
                  </fieldset>
              </div>
            </div>          
          </div>
        </div>
    </section>
       
  @endsection

  @section('script')
  @endsection