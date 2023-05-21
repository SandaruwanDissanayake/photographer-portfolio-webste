function changeImage() {
    var view = document.getElementById("viweImage");
    var file = document.getElementById("cartImge");

    file.onchange = function() {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

$(document).ready(function() {
    var id = document.getElementById("id").value;
    var currentPageUrl = window.location.href;
    var addNewUrl = "http://localhost/photograpgy/addNew.php";
    var addNewUr2 = "http://localhost/photograpgy/addNew2.php?id=" + id;

    var homeUrl = "http://localhost/photograpgy/adminPanel.php";
    var addNew = $("#addNew");
    // var home = $("#adminhome");
    var home = document.getElementById("adminhome");
    var s = $("#s");



    if (currentPageUrl === addNewUrl) {
        home.removeClass('active');
        s.removeClass('active');



    } else if (currentPageUrl === homeUrl) {
        addNew.removeClass('active');
        s.removeClass('active');

    } else if (currentPageUrl === addNewUr2) {
        home.removeClass('active');
        s.removeClass('active');
    }
});

function changeProductImage() {


    var image = document.getElementById("ccoverImage");
    var savebtn = document.getElementById("saveCover");
    // var selectbtn = document.getElementById("selectCover");
    savebtn.classList = "d-block";
    // selectbtn.classList = "d-none";


    image.onchange = function() {


        var file_count = image.files.length;


        if (file_count <= 3) {
            // alert(file_count);
            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("i" + x).src = url;
            }
        } else {
            alert("please select 3 or less than 3 image ");
        }
    }
}

function changeImageGallary() {
    var image = document.getElementById("imagegallary");

    image.onchange = function() {


        var file_count = image.files.length;


        if (file_count <= 20) {
            // alert(file_count);
            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("g" + x).src = url;
                document.getElementById("close" + x).classList = ('btn-close');
                document.getElementById("remove" + x).innerHTML = "Remove";
            }
        } else {
            alert("please select 20 or less than 20 image ");
        }
    }
}

function removeImage(id) {
    if (id == 0) {
        document.getElementById("g" + id).src = "assets/img/blog/7.jpg";
        document.getElementById("close" + id).classList = ('');
        document.getElementById("remove" + id).innerHTML = "";
    } else {
        document.getElementById("g" + id).src = "";
        document.getElementById("close" + id).classList = ('');
        document.getElementById("remove" + id).innerHTML = "";


    }
}

function adminSignIn() {

    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var remeberMe = document.getElementById("rememberMe");



    var f = new FormData();

    f.append("email", email.value);
    f.append("password", password.value);
    f.append("remeberMe", remeberMe.checked);


    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}

function uploadCart() {
    var about = document.getElementById("about");
    var datetime = document.getElementById("datetime");
    var image = document.getElementById("cartImge");

    var f = new FormData();

    f.append("about", about.value);
    f.append("datetime", datetime.value);
    if (image.files.length == 0) {



        alert("you have not select any image");

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var responseText = r.responseText;


            if (responseText == "1") {
                // Redirect to a new page with the post_id parameter in the URL
                alert("Error: " + "somthing Went wrong error. Pleace Try again");
            } else {
                window.location.href = "addNew2.php?id=" + responseText;

            }

        }
    }

    r.open("post", "uploadCartProcess.php", true);
    r.send(f);

}

function AddCoverImage(id) {
    var ccoverImage = document.getElementById("ccoverImage");
    // var des = document.getElementById("des");
    // var gallry = document.getElementById("imagegallary");

    var f = new FormData();

    // f.append("des", des.value);
    f.append("pid", id);

    var file_countCover = ccoverImage.files.length;

    for (var c = 0; c < file_countCover; c++) {
        // alert(c);
        f.append("coverImage" + c, ccoverImage.files[c]);
    }


    // var file_count = gallry.files.length;
    // for (var g = 0; g < file_count; g++) {

    //     f.append("gallaryImage" + g, gallry.files[g]);
    // }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "done") {
                window.location.reload();
            } else if (t == "donedone") {
                window.location.reload();
            } else if (t == "donedonedone") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addCoverImageProcess.php", true);
    r.send(f);
}

function addGallryImge(id) {
    var gallry = document.getElementById("imagegallary");

    var f = new FormData();


    f.append("pid", id);

    var file_count = gallry.files.length;
    for (var g = 0; g < file_count; g++) {

        f.append("gallaryImage" + g, gallry.files[g]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    }

    r.open("POST", "addGallryImageProcess.php", true);
    r.send(f);
}

function addDes(id) {
    var des = document.getElementById("des");
    var f = new FormData();

    f.append("des", des.value);
    f.append("pid", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addDesProcess.php", true);
    r.send(f);

}

function viewCart(id) {

    window.location = "viewPost.php?id=" + id;


}

function view(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("viweImage").src = t;
        }
    }
    r.open("GET", "viewImageProcess.php?id=" + id, true);
    r.send();
}

function selectgallry() {

    // document.getElementById("selectCover").classList = "d-none";
    var saveCover = document.getElementById("savegallry");
    saveCover.classList = "d-block";
}