import javax.swing.JFrame;

public class Converter {
	 
    public static void main(String[] args) {
    	
    	//creating the main frame and naming it
        JFrame frame = new JFrame("Converter: c7227225");
       
      //setting the location of the frame 
        frame.setLocation(500, 200);   
        
      //closing from the memory
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);  
        
        //creating an object that instances mainpanel class
        MainPanel panel = new MainPanel();  
        
      //adding menubar to the frame
        frame.setJMenuBar(panel.setupMenu());   
    
      //adding menuBar to the contentpane
        frame.getContentPane().add(panel); 
        
      //all packed together to the frame
        frame.pack();   
        
      //setting the visibility of the frame to true
        frame.setVisible(true);  
    }
}

