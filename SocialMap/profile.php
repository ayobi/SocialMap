<?php
	include 'header.php';
?>

<style type="text/css">
#ProfilePage
{
    /* Move it off the top of the page, then centre it horizontally */
    margin: 50px auto;
    width: 635px;

/* For visibility. Delete me */
border: 1px solid red;
}

#LeftCol
{
    /* Move it to the left */
    float: left;

    width: 200px;
    text-align: center;

    /* Move it away from the content */
    margin-right: 20px;

/* For visibility. Delete me */
border: 1px solid brown;
}

#Photo
{
    /* Width and height of photo container */
    width: 200px;
    height: 200px;

/* For visibility. Delete me */
border: 1px solid green;
}

#PhotoOptions
{
    text-align: center;
    width: 200px;

/* For visibility. Delete me */
border: 1px solid brown;
}

#Info
{
    width: 400px;
    text-align: center;

    /* Move it to the right */
    float: right;

/* For visibility. Delete me */
border: 1px solid blue;
}

#Info strong
{
    /* Give it a width */
    display: inline-block;
    width: 100px;

/* For visibility. Delete me */
border: 1px solid orange;
}

#Info span
{
    /* Give it a width */
    display: inline-block;
    width: 250px;

/* For visibility. Delete me */
border: 1px solid purple;
}
</style>

<div id="ProfilePage">
    <div id="LeftCol">
        <div id="Photo">
<img src="http://cdn87.psbin.com/img/mw=160/mh=210/cr=n/d=g6p4a/p8nrrquhs51v015z.jpg" alt="Diego" style="max-width:100%;max-height:100%;">
</div>
        <div id="ProfileOptions">
        a
        </div>
    </div>

    <div id="Info">
        <p>
            <strong>Name:</strong>
            <span>Sirjon</span>
        </p>
        <p>
            <strong>Last Name:</strong>
            <span>Sirjon</span>
        </p>
        <p>
            <strong>Username:</strong>
            <span>Sirjon</span>
        </p>
        <p>
            <strong>Number Pictures:</strong>
            <span>Sirjon</span>
        </p>
        <p>
            <strong>Number Albums:</strong>
            <span>Sirjon</span>
        </p>
    </div>

    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>

Image: <input type='file' name='image' size='14' maxlength='32' />
<input type='submit' value='Save Profile' />
</form></div><br /></body></htm