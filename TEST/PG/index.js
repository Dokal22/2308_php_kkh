
const btn = document.querySelector('#btn');
btn.addEventListener('click', async () => {
    // const response = await PortOne.requestPayment({
    //     // Store ID 설정
    //     storeId: "store-9902f23f-c7a3-48d5-943b-23fb8eb28d69",
    //     // 채널 키 설정
    //     channelKey: "channel-key-5e212580-0ebf-41a6-92e2-1e8dcbd9fb3e",
    //     paymentId: `payment-${crypto.randomUUID()}`,
    //     orderName: "나이키 와플 트레이너 2 SD",
    //     totalAmount: 1000,
    //     currency: "CURRENCY_KRW",
    //     payMethod: "CARD",
    // });

    const response = await PortOne.loadPaymentUI({
        uiType: "PAYPAL_SPB",
        storeId: 'store-9902f23f-c7a3-48d5-943b-23fb8eb28d69',
        paymentId: `payment-${crypto.randomUUID()}`,
        orderName: "나이키 와플 트레이너 2 SD",
        totalAmount: 1000,
        channelKey: "channel-key-5e212580-0ebf-41a6-92e2-1e8dcbd9fb3e",
        currency: "CURRENCY_KRW",
    });
});