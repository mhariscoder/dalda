function transform() {
    let ele = document.getElementById("dob");
    ele.value = ele.value
        .replace(/^(\d{2})$/g, "$1-")
        .replace(/^(\d{2}\-\d{2})$/g, "$1-");
}

$(document).ready(function () {
    $(".loginFormButton").click(function (e) {
        e.preventDefault();
        const isStudent = e.target.dataset.name === "student";
        if (!isStudent) {
            $('#type').val("admin");
            $('[data-name="student"]').removeClass("active");
            $('[data-name="admin"]').addClass("active");
            $("#borderChange").css("border-color", "var(--primary-color)");
            $(".login-link span").text("Student Login");
            $(".login-link a span").attr("data-name", "student");
            $(".login-link a i").attr("data-name", "student");
        } else {
            $('#type').val("student");
            $('[data-name="admin"]').removeClass("active");
            $('[data-name="student"]').addClass("active");
            $("#borderChange").css("border-color", "var(--primary-color)");
            $(".login-link span").text("Admin Login");
            $(".login-link a  span").attr("data-name", "admin");
            $(".login-link a i").attr("data-name", "admin");
        }
    });

    const mentors = document.querySelectorAll(".achievers .mentor");
    mentors.forEach((mentor) => {
        mentor.addEventListener("mouseover", function () {
            mentor.children[0].children[0].play();
        });
        mentor.addEventListener("mouseout", function () {
            mentor.children[0].children[0].pause();
        });
    });

    const imagesGallery = document.querySelectorAll(".imagesGallery-card");
    imagesGallery.forEach((galleryCard) => {
        galleryCard.addEventListener("click", function () {
            const video = galleryCard.children[0];
            if (video.paused) {
                const activeVideo = $(".imagesGallery-card.active");
                if (activeVideo.length) {
                    activeVideo[0].children[0].pause();
                    $(".imagesGallery-card.active i").removeClass("fa-pause");
                    $(".imagesGallery-card.active i").addClass("fa-circle-play");
                    activeVideo.removeClass("active");
                }

                $(this).addClass("active");
                $(".imagesGallery-card.active i").removeClass("fa-circle-play");
                $(".imagesGallery-card.active i").addClass("fa-pause");
                video.play();
            } else {
                $(".imagesGallery-card.active i").removeClass("fa-pause");
                $(".imagesGallery-card.active i").addClass("fa-circle-play");
                $(this).removeClass("active");
                video.pause();
            }
        });
    });

    const allianceModal = document.getElementById("allianceModal");
    const modal = document.getElementById("sponsorModal");
    let elements = document.querySelectorAll(".sponsorNow");
    const alert = document.querySelector('.alert-danger');
    let clickEvent = (e) => {
        e.preventDefault();
        const id = e.target.dataset.id;
        const image = e.target.dataset.image;
        const name = e.target.dataset.name;
        const grade = e.target.dataset.grade;
        const degree = e.target.dataset.degree;
        const idField = document.querySelector('#id');
        const imageField = document.querySelector('#imageModal');
        const nameField = document.querySelector('#studentName');
        const gradeField = document.querySelector('#grade');
        const degreeField = document.querySelector('#degree');
        const imageView = document.querySelector('#imageModalView');
        const nameView = document.querySelector('#nameView');
        const gradeView = document.querySelector('#gradeView');
        const degreeView = document.querySelector('#degreeView');
        if (id) {
            idField.value = id;
        }
        if (image) {
            imageField.value = image;
            imageView.src = image;
        }
        if (name) {
            nameField.value = name;
            nameView.innerHTML = name;
        }
        if (grade) {
            gradeField.value = grade;
            gradeView.innerHTML = grade;
        }
        if (degree) {
            degreeField.value = degree;
            degreeView.innerHTML = degree;
        }
        modal.style.display = "flex";
    };
    Array.prototype.forEach.call(elements, (item) => {
        item.addEventListener("click", clickEvent);
    });

    const span = document.getElementsByClassName("modalClose")[0];
    if(span != null){
        span.onclick = function () {
            modal.style.display = "none";
            if (typeof (alert) != 'undefined' && alert != null) {
                alert.style.display = "none";
            }
        };
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == allianceModal) {
            allianceModal.style.display = "none";
        }
        if (typeof (alert) != 'undefined' && alert != null) {
            alert.style.display = "none";
        }
    };

});
const $menu = $(".menu-icon");

const onMouseUp = (e) => {
    if (
        !$menu.is(e.target) && // If the target of the click isn't the container...
        $menu.has(e.target).length === 0
    ) {
        // ... or a descendant of the container.
        $menu.removeClass("active");
    }
};

$(".menu-icon").on("click", () => {
    $menu
        .toggleClass("active")
        .promise()
        .done(() => {
            if ($menu.hasClass("active")) {
                $(document).on("mouseup", onMouseUp); // Only listen for mouseup when menu is active...
            } else {
                $(document).off("mouseup", onMouseUp); // else remove listener.
            }
        });
});

$(".universityLogos").owlCarousel({
    loop: true,
    margin: 50,
    nav: false,
    autoplay: true,
    responsive: {
        0: {
            items: 3,
        },
        600: {
            items: 5,
        },
        1000: {
            items: 7,
        },
    },
});
$(".achieverVideo").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    navText: [
        "<i class='fa fa-chevron-left achieverVideoBtn achieverVideoBtn-prev'></i>",
        "<i class='fa fa-chevron-right achieverVideoBtn achieverVideoBtn-next'></i>",
    ],
    responsive: {
        0: {
            items: 1.3,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

$(document).ready(function () {
    $(".rtl-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".rtl-slider-nav",
    });
    $(".rtl-slider-nav").slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        vertical: true,
        asNavFor: ".rtl-slider",
        centerMode: false,
        focusOnSelect: true,
        prevArrow: ".thumb-prev",
        nextArrow: ".thumb-next",
    });
});

var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

if (iOS) {
    document.write(
        "<style>h1,h2,h3,h4,h5,h6,.banner .banner__content .btn-secondary { font-family: Helvetica Condensed Light }</style>"
    );
}
