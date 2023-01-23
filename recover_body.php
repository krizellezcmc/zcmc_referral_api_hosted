<?php 
function recover_body($firstName, $vCode) {
    $body = '
    <body
    style="
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
    "
  >
    <div
      style="width: 600px; height: auto; box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;border-radius: 5px;"
    >
      <!-- <div style="background: #058e46; padding: 20px 0px 1px 20px">
        <p style="font-size: 18px; font-weight: 600; color: white">
          Account Recovery
        </p>
      </div> -->
      <div style="padding: 10px">
        <p
          class="text-top"
          style="font-size: 16px; font-weight: bold; margin-bottom: 30px"
        >
          Hello '.$firstName.',
        </p>

        <div
          class="body"
          style="font-size: 15px; font-weight: light; text-align: justify"
        >
          <p>
            Your account is temporarily locked. To recover your account, enter
            the verification code and follow the instructions to reset your
            password.
          </p>

          <p style="margin-top: 30px">
            The verification code is: <b style="font-size: 18px">' .$vCode.'</b>
          </p>
        </div>

        <div
          style="
            font-size: 15px;
            font-weight: light;
            text-align: justify;
            margin-top: 30px;
          "
        >
          <p>
            If you have questions, you may contact us at
            <a
              href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSKjRRPSrcckgnGMsKRMqrVVMpgTwHCKmhCfjgXTJdWRvBWwGnPvnbQhWghrGtLWRjfrGmxB"
              >zcmc.referral@gmail.com</a
            >
          </p>
        </div>
      </div>
    </div>
  </body>';

    return $body;
 
}

?>