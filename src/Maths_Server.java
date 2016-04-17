import org.json.JSONException;
import org.json.JSONObject;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Arrays;

@WebServlet("/maths-server")
public class Maths_Server extends HttpServlet
{
    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        //String inputString = request.getParameter("loanInputs");
        String inputString =request.getParameter("loanInputs");
        System.out.println(""+inputString);
        // Example input: { "amount": 100000, "rate": 5.5, "months": 360 };
        // Example String: String inputString = "{ \"amount\": 100000, \"rate\": 5.5, \"months\": 360 }";
        String num1;
        String num2 ;
        String num3;
        String num4 ;
        String num5 ;
        int max =0;
        int min =0;
        int sum =0;
        String Sum = null;
        String Max = null;
        String Min = null;
        String []array =new String[5];
        try {
            System.out.println("GETting this far");

            JSONObject inputValues = new JSONObject(inputString);
            System.out.println("GETting this far too  ");

            num1 = inputValues.getString("num1");
            System.out.println(""+num1);
            array[0]=num1;
            System.out.println("arr 0:"+array[0]);

            num2 = inputValues.getString("num2");
            System.out.println(""+num2);
            array[1]=num2;
            System.out.println("arr 1:"+array[1]);

            num3 = inputValues.getString("num3");
            System.out.println(""+num3);
            array[2]=num3;
            System.out.println("arr 2:"+array[2]);

            num4 = inputValues.getString("num4");
            System.out.println(""+num4);
            array[3]=num4;
            System.out.println("arr 3:"+array[3]);

//            num5 = inputValues.getString("num5");
//            System.out.println(""+num5);
//            array[4]=num5;
//            System.out.println("arr 4:"+array[4]);

            Arrays.sort(array);

//            min=array[0];
//            max=array[array.length-1];
////            for(int i=0;i<array.length-1;i++)
////            {
//                sum=array[0]+array[1]+array[2]+array[3]+array[4];
////            }
            Sum=(""+(sum));
            System.out.println("Sum:"+(sum));

            Max = (""+(max));
            System.out.println("Max: "+(max));
            Min = (""+(min));
            System.out.println("Min: "+(min));


        } catch (Exception e) {  // NullPointerException and JSONException
            // Use default values assigned before the try block
        }
        //PaymentInfo info = new PaymentInfo(num1, num2, num3);
        JSONObject info = new JSONObject();
        try {
            info.put("Sum",Sum);
            info.put("Max",Max);
            info.put("Min",Min);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        String info2 = info.toString();
        PrintWriter out = response.getWriter();
        try {
            out.println(new JSONObject(info2));
        } catch (Exception e) {
            e.printStackTrace();
        }
    }



    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        doGet(request, response);
    }

}
