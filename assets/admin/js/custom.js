function crop() {
    var picture = $('#product_picture');
    console.log(picture);

    picture.guillotine({width: 400, height: 300});
}
