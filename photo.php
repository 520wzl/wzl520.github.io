<?php
//�������
header("Access-Control-Allow-Origin:*");
echo base64();
function base64()
{
    //���� base64 ����
    $image = $_POST['imegse'];
    if (empty($image)) {
        return null;
    }
    //����ͼƬ����
    $imageName = date("His", time()) . "_" . rand(1111, 9999) . '.png';
    //�ж��Ƿ��ж��� ����оͽ�ȡ��벿��
    if (strstr($image, ",")) {
        $image = explode(',', $image);
        $image = $image[1];
    }
    //����ͼƬ����·��
    $path = "./" . getIp() . '/' . date("Ymd", time());
    //�ж�Ŀ¼�Ƿ���� �����ھʹ���
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    //ͼƬ·��
    $imageSrc = $path . "/" . $imageName;
    //�����ļ��к�ͼƬ
    $r = file_put_contents($imageSrc, base64_decode($image));
    if (!$r) {
        return 0;
    } else {
        return 1;
    }
}
function getIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}