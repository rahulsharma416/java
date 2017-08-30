import java.lang.*;

class CSample {
	int i = -1;
	boolean flag = true;
}

class CProducer extends Thread {
	CSample obj;
	public CProducer(CSample obj) {
		this.obj = obj;
	}
	synchronized public void run() {
		while(obj.i < 10) {
			if(obj.flag) {
				System.out.println("P: " + (++obj.i));
				obj.flag = false;
			}
		}
	}
}

class CConsumer extends Thread {
	CSample obj;
	public CConsumer(CSample obj) {
		this.obj = obj;
	}
	synchronized public void run() {
		while(obj.i < 11) {
			if(!obj.flag) {
				System.out.println("C: " + obj.i);
				obj.flag = true;
			}
		}
	}
}

public class P1 {
	public static void main(String[] args) {
		CSample obj = new CSample();
		CProducer cPObj = new CProducer(obj);
		cPObj.start();
		CConsumer cCObj = new CConsumer(obj);
		cCObj.start();
	}
}
