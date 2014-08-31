import com.PKCS7;


public class Sample {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String message = "Test Java";
		String pass = "123";
		String path1 = "Cert/MerchantPublic.cer";
		String path2 = "Cert/MerchantPrivate(123).pfx";
		
		PKCS7 pk = new PKCS7();

		try{
		String base64Str = pk.encryptMessage(message,pk.getPublicCert(path1));
		System.out.println("Encrypted : " + base64Str);
		String clearStr=pk.decryptMessage(base64Str, path2, pass);
		System.out.println("Clear : " + clearStr);
		}catch (Exception e) {
			// TODO: handle exception
			System.out.println(e.toString());
		}
	}

}
