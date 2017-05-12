
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function () {
    updated();
    $('#createTask').submit(
        sendCreateForm()
    );
});
function updated() {
    $('.updated').change(function() {
        var c = $(this).parent().parent(),
            id = c.find('.id').html(),
            param = c.find('select').serialize();
        param += '&id=' + id;
        param += '&_token=' + Laravel.csrfToken;
        $.ajax({
            type: 'PUT',
            url: '/api/'+id,
            data: param,
            success: function(data, status) {
                switch (data.code) {
                    case 200:
                        if (data.data.show)
                            c.replaceWith(data.data.tr);
                        else
                            c.remove();
                        updated();
                        break;
                    default:
                        $('.alert-tabel.alert-danger').show();
                        $('.danger-text').html(data.data);
                        break;
                }
            }
        });
    });
}
function sendCreateForm(){
    $('#FormCreateTask').on('submit', function(event) {
        var form = $('#createTask'),
            param = form.find('input').serialize();
        param += '&' + form.find('select').serialize() ;
        param += '&' + form.find('textarea').serialize() ;
        param += '&_token=' + Laravel.csrfToken;
        $.ajax({
            type: 'POST',
            url: form.attr('data-url'),
            data: param,
            success: function(data, status) {
                console.log(data);
                console.log(status);
                switch (data.code) {
                    case 200:
                        $('#tasks_table > tbody:last-child').append(data.data);
                        form.modal('hide');
                        updated();
                        break;
                    default:
                        form.find('.alert.alert-danger').show();
                        form.find('.danger-text').html(data.data);
                        break;
                }
            }
        });
        event.preventDefault();
    });
}