<div class="container">
    <ul class="navBar">
      <li class="navItem active" id="allBtn">ALL</li>
      <li class="navItem" id="inviteBtn">INVITE</li>
      <li class="navItem" id="requestBtn">REQUESTS</li>
    </ul>
  </div>

<div class="visibleTab" id="allTab">
  <?php include "allFriends.php" ?>
</div>

<div class="hiddenTab" id="inviteTab">
  <?php include "inviteFriends.php" ?>
</div>

<div class="hiddenTab" id="requestTab">
  <?php include "friendRequests.php" ?>
</div>

<script src="../scripts/js/friends.js"></script>