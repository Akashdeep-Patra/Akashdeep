/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
// JavaScript Document
$(document).ready(function (e) {
  // class should be named as .classname , for if use #elementid
  form = '#mail_me'

  $(form).on('submit', function (e) {
    //preventing the form from submission for AJAX submission.
    e.preventDefault()
    //enter the id or class of form which is to be processed
    //serializing all form data.
    var data = $(form).serialize()

    $.ajax({
      type: 'POST',
      url: 'sendmail.php',
      data: data,
      dataType: 'html',
      crossDomain: 'true',
      success: function (data) {
        $(form).append(data)
      },
      error: function () {
        //if any error happens during ajax, set your custom message here
        alert('something wrong has happened')
      }
    })
  })
})
