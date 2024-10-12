{
	const price_1 = document.querySelector('#price_1')
	const price_2 = document.querySelector('#price_2')
	const salesCommission = document.querySelector('#sales_commission')
	const withdrawal = document.querySelector('#withdrawal')
	const purchaseCommission = document.querySelector('#purchase_commission')
	const result = document.querySelector('#result')
	const btn = document.querySelector('#calculate_btn')
	btn.addEventListener('click', () => {
		const value =
			Number(price_2.value) -
			Number(price_1.value) -
			Number(salesCommission.value) -
			Number(withdrawal.value) -
			Number(purchaseCommission.value)
		result.innerHTML =
			value >= 0 ? `<span class='text_green'>${value}</span>` : `<span class='text_red'>${value}</span>`
	})
}
