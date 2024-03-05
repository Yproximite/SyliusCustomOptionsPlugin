var customerOptions = {
	"changeCustomerAmountCurrencyOnChannelChange":
			function (element) {
					// Get the currency from the selected channel
					var currency = $(element).children().filter(":selected")[0].getAttribute("data-attribute");

					//Select the amount input
					var amountInputId = '#' + $(element).attr('id').replace('_channel', '_amount');

					//Set the label (previous element) to the currency
					var amountLabel = $(amountInputId).prev();
					$(amountLabel).text(currency);
			}
};

$(document).ready(function () {
	const channelSelects = document.querySelectorAll('#sylius_product_customer_option_value_prices [data-form-collection-index] .product-customer-option-channel');
	channelSelects.forEach(function(channelSelect) {
		channelSelect.dispatchEvent(new Event('change'));
	});

	const addBtn = document.querySelector('#sylius_product_customer_option_value_prices [data-form-collection="add"]');
	if (addBtn !== null) {
		addBtn.addEventListener("click", (event) => {
			setTimeout(function(){
				const channelSelect = document.querySelector('#sylius_product_customer_option_value_prices [data-form-collection-index]:last-of-type .product-customer-option-channel');
				if (channelSelect === null) {
					return;
				}
				channelSelect.dispatchEvent(new Event('change'));
			}, 100);
		});
	}
});
