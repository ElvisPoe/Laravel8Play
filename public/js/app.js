// alert('Okk')

function selectCategory() {
    value = document.getElementById("categories_select").value;

    if(value === 'all'){
        window.location.href = "/posts";
    } else {
        window.location.href = "/posts?category="+value;
    }

}
