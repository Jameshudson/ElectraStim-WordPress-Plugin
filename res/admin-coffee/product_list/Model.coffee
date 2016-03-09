@Model = do ->

	priceInputFields = null
	salePriceInputFields = null

	defultValues = null
	defultSalesValues = null

	init = () ->
		priceInputFields = document.getElementById('product_list-page-priceTable').getElementsByTagName 'input'
		salePriceInputFields = document.getElementById('product_list-page-salePriceTable').getElementsByTagName 'input'

		defultValues = clonePrices priceInputFields
		# defultSalesValues = clonePrices salePriceInputFields

	calculatorPrice = (price, percent) ->
		((price / 100) * percent)

	updatePricesByPercentage = (percent) ->

		for i in priceInputFields
			i.value = i.value - calculatorPrice i.value, percent

	updatePricesByFixedAmount = (amount) ->

		for i in priceInputFields
			i.value = (i.value - amount)

	resetPrices = () ->
		alert defultValues.length
		for i in defultValues
			alert i.value
			priceInputFields.value = i.value

	resetSalesPrices = () ->

		for i in defultSalesValues
			salePriceInputFields.value = i.value

	clonePrices = (priceInput) ->

		resutls = []

		for i in priceInput
			resutls.push = i.value
		return resutls

	init: init

	calculatorPrice: calculatorPrice

	clonePrices: clone

	updatePricesByPercentage: updatePricesByPercentage
	updatePricesByFixedAmount: updatePricesByFixedAmount

	resetPrices: resetPrices
	resetSalesPrices: resetSalesPrices