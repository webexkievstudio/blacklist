/**
 * Created by Oleg on 14.02.2017.
 */

function grabPhones() {
    var phonesDom = $(selectors.phoneBlock).find(selectors.textPhone);
    var phones = [];
    for (var i = 0; i < phonesDom.length; i++) {
        var currentPhone = $(phonesDom).eq(i).text();
        currentPhone = '38' + currentPhone.replace(/\s/ig, '');
        phones.push(currentPhone);
    }
    return phones;
}

var selectors = {
    phoneBlock: '.contact-button.link-phone',
    getPhone: '.spoiler',
    textPhone: 'strong span',
    message: '.message',
    addToBlacklist: '.addToBlacklist'
};

// chrome.runtime.sendMessage(grabPhones());

// lets get phones
$(selectors.phoneBlock).find(selectors.getPhone).click();

// Listen for messages from the popup
chrome.runtime.onMessage.addListener(function (msg, sender, response) {
    response(grabPhones());
});
