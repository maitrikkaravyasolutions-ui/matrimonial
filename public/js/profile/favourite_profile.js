function BookmarkFunction(profileId, el) {
    fetch(`/user/profile/favourite`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            profile_id: profileId
        })
    })
    .then(async (res) => {
        const contentType = res.headers.get("content-type") || "";

        if (res.redirected || contentType.includes("text/html")) {
            const redirectUrl = res.url || "/email/verify";
            throw { type: "verification_redirect", redirectUrl };
        }

        if (!res.ok) {
            let message = "Unable to update favourite profile.";
            try {
                const errorData = await res.json();
                message = errorData.message || message;
            } catch (e) {}
            throw { type: "request_error", message };
        }

        return res.json();
    })
    .then(data => {
        el.blur();
        Swal.fire({
          title: 'Good job!',
          text: 'Pofile Removed from Favourite',
          icon: 'success',
          confirmButtonText: 'OK',
          confirmButtonColor: '#8b1e3f',
          returnFocus: false
        }).then((result) => {
          if (result.isConfirmed) {
            location.reload();
          }
        });
    })
    .catch((error) => {
        if (error?.type === "verification_redirect") {
            Swal.fire({
                title: "Email verification required",
                text: "Please verify your email to manage favourites.",
                icon: "warning",
                confirmButtonText: "Verify Email"
            }).then(() => {
                window.location.href = error.redirectUrl;
            });
            return;
        }

        Swal.fire({
            title: "Something went wrong",
            text: error?.message || "Unable to update favourite profile right now.",
            icon: "error"
        });
    });
}


document.getElementById('filter_form').addEventListener('submit', function(e) {
    let minAge = document.getElementById('min_age').value;
    let maxAge = document.getElementById('max_age').value;

    minAge = minAge ? parseInt(minAge) : null;
    maxAge = maxAge ? parseInt(maxAge) : null;

    if (minAge !== null && maxAge !== null && minAge > maxAge) {
        alert('Minimum age cannot be greater than maximum age');
        e.preventDefault();
    }
});


$(document).ready(function () {
    $('select[name="sorting"]').on('change', function () {
        $('#sort_by').val($('#sorting').val());
        $('#filter_form').submit();
    });
});

document.addEventListener("DOMContentLoaded", function () {
  const filterAccordion = document.getElementById('filterAccordion_full');
  const filterToggleBtn = document.getElementById('filterToggleBtn');
  const icon = filterToggleBtn.querySelector('i');

  const bsCollapse = new bootstrap.Collapse(filterAccordion, {
    toggle: false
  });

  filterToggleBtn.addEventListener('click', function () {
    if (filterAccordion.classList.contains('show')) {
      bsCollapse.hide();
    } else {
      bsCollapse.show();
    }
  });

  filterAccordion.addEventListener('shown.bs.collapse', function () {
    icon.classList.remove('bi-chevron-compact-down');
    icon.classList.add('bi-chevron-compact-up');
  });

  filterAccordion.addEventListener('hidden.bs.collapse', function () {
    icon.classList.remove('bi-chevron-compact-up');
    icon.classList.add('bi-chevron-compact-down');
  });
});


let page = 1;
let loading = false;
let hasMore = true;

$(window).on("scroll", function () {

    if (loading || !hasMore) return;

    let scrollTop = $(window).scrollTop();
    let windowHeight = $(window).height();
    let documentHeight = $(document).height();

    if (scrollTop + windowHeight >= documentHeight - 100) {
        loadMore();
    }
});

function loadMore() {
    loading = true;

    page++;

    $.ajax({
        url: "/user/favourite-profile?page=" + page,
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (res.html.trim() !== "") {
                $('#favourite_profile_list').append(res.html);
            }

            if (!res.has_more) {
                hasMore = false;
                $('#favourite_profile_list').append("<span class='text-center' style='font-size=0.86rem'>No More Record found</span>");
            }

            loading = false;
        },
        error: function () {
            loading = false;
        }
    });
}

let scrollTimeout;

$(window).on("scroll", function () {
    clearTimeout(scrollTimeout);

    scrollTimeout = setTimeout(function () {

        if (loading || !hasMore) return;

        let scrollTop = $(window).scrollTop();
        let windowHeight = $(window).height();
        let documentHeight = $(document).height();

        if (scrollTop + windowHeight >= documentHeight - 100) {
            loadMore();
        }

    }, 200);
});
