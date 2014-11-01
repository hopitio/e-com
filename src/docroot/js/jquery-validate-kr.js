jQuery.extend(jQuery.validator.messages, {
    required: "이 필드는 필요하다.",
    remote: "이 정보를 수정하십시오.",
    email: "정확한 이메일 주소를 입력하십시오.",
    url: "올바른 경로를 입력하십시오.",
    date: "정확한 날짜를 입력하십시오.",
    dateISO: "정확한 날짜 (ISO)를 입력하십시오.",
    number: "숫자를 입력하세요.",
    digits: "숫자를 입력하세요.",
    creditcard: "유효한 신용 카드 번호를 입력하십시오.",
    equalTo: "입력 한 값이 올바르지 않습니다.",
    accept: "유효한 확장자를 가진 값을 입력하십시오.",
    maxlength: jQuery.validator.format("당신은 {0} 자 미만을 입력 할 수 있습니다."),
    minlength: jQuery.validator.format("당신은 {0} 자 이상 입력 할 수 있습니다."),
    rangelength: jQuery.validator.format("{0}과 {1} 자 사이의 값을 입력하십시오."),
    range: jQuery.validator.format("사이의 값을 입력하십시오 {0}과 {1}."),
    max: jQuery.validator.format("보다 작거나 {0}과 같은 값을 입력하십시오."),
    min: jQuery.validator.format("보다 크거나 {0}과 같은 값을 입력하십시오."),
});