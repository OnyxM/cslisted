@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <h1>My Account Page</h1>
    <div class="content-page">
      <h3>My Account</h3>
      <ul>
        <li><a href="javascript:;">Edit your account information</a></li>
        <li><a href="javascript:;">Change your password</a></li>
        <li><a href="javascript:;">Modify your address book entries</a></li>
        <li><a href="javascript:;">Modify your wish list</a></li>
      </ul>
      <hr>

      <h3>My Orders</h3>
      <ul>
        <li><a href="javascript:;">View your order history</a></li>
        <li><a href="javascript:;">Downloads</a></li>
        <li><a href="javascript:;">Your Reward Points</a></li>
        <li><a href="javascript:;">View your return requests</a></li>
        <li><a href="javascript:;">Your Transactions</a></li>
      </ul>
    </div>
  </div>
<!-- END CONTENT -->    
@endsection
