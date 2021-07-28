<!-- Nội dung template chỉ nên sử dụng HTML cơ bản (TABLE, CSS INLINE...) -->

<table border="1">
  <tr>
    <td>
      <img src="https://nentang.vn/wp-content/uploads/2019/06/logo-nentang.jpg" style="width: 150px; height: 150px;" />
    </td>
    <td>SUNSHINE COMPANY</td>
  </tr>
  <tr>
    <td style="color: red;">Email khách vừa liên hệ:
      {{ $data['email'] }}
    </td>
    <td>Lời nhắn của khách:
      {{ $data['message'] }}
    </td>
  </tr>
</table>