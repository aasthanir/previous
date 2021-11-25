package c7227225_Aastha;
/*This program is a GUI based application which is designed for the conversion of currencies where the text file is to be loaded*/
//REQUIREMENT 2 : File Based Conversion

//importing all the java classes required in the program
import java.awt.Color;
import java.awt.Font;
import java.awt.SystemColor;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.InputEvent;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.InputStreamReader;
import java.text.DecimalFormat;
import java.util.ArrayList;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JComboBox;
import javax.swing.JFileChooser;
import javax.swing.JLabel;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.KeyStroke;
import javax.swing.SwingConstants;
import javax.swing.border.EtchedBorder;

@SuppressWarnings("serial")

//inheriting the java class JPanel in CurrencyPanel
public class CurrencyPanel extends JPanel 
{
	//declaring instances
	private JTextField textField;
	private JCheckBox checkBox;
	private JLabel label, countLabel, amountLabel;
	private JButton resetButton, convertButton;
	int counter=0;
	//declaring string type of data for comboBox
	private JComboBox<String> combo =new JComboBox<String>();
	//creating an object Currency 
	private ArrayList <Currency> inputList = new ArrayList<Currency>();
	
	//creating object storing instance of convert listener class, implementing ActionListener
	ActionListener listener = new ConvertListener(); 
	
	//creating menuBar
	public JMenuBar setupMenu() 
	{
		//when setupmenu is called fileOpen is called and curreny.txt is opened
		fileOpen(new File("currency.txt"));	
			
			//creating a menubar on the frame
			JMenuBar menuBar = new JMenuBar();
			menuBar.setBackground(Color.WHITE);
			
			//adding menus to the menubar
			JMenu menuFile = new JMenu("File");
			menuBar.add(menuFile);
			
				// adding items to "FILE" menu
				JMenuItem itemNew = new JMenuItem("New ");
				//adding icon to the menu
				itemNew.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225_Aastha/src/c7227225_Aastha/newfile.png"));
				//adding shortcut keys to the menu
				itemNew.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_N, InputEvent.CTRL_MASK));
				menuFile.add(itemNew);
				
				JMenuItem itemLoad = new JMenuItem("Load");
				itemLoad.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_N, InputEvent.CTRL_MASK | InputEvent.ALT_MASK));
				menuFile.add(itemLoad);
				
					//adding actionlistener for load
					itemLoad.addActionListener(new ActionListener() {
			
						@Override
						public void actionPerformed(ActionEvent e) {
							
							JFileChooser file=new JFileChooser();
							//opening the file using dialog box
							int message= file.showOpenDialog(null);
							if (message == JFileChooser.APPROVE_OPTION) {
								//passing into loadfile whatever file is selected 
								fileOpen(file.getSelectedFile());
							}
							
						}
						
					});
				
				JMenuItem itemSave = new JMenuItem("Save");
				itemSave.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225_Aastha/src/c7227225_Aastha/savefile.png"));
				itemSave.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_S, InputEvent.CTRL_MASK));
				menuFile.add(itemSave);
				
				JMenuItem itemExit = new JMenuItem("Exit");
				itemExit.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225_Aastha/src/c7227225_Aastha/CLOSE.png"));
				itemExit.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_W, InputEvent.CTRL_MASK));
					//exit when closed
					itemExit.addActionListener(e -> System.exit(0));
				menuFile.add(itemExit);
			
			// adding items to "EDIT" menu
			JMenu menuEdit = new JMenu("Edit");
			//adding components to the menu EDIT
			menuBar.add(menuEdit);
			
				JMenuItem itemCut= new JMenuItem("Cut");
				itemCut.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225_Aastha/src/c7227225_Aastha/cut.png"));
				itemCut.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_X, InputEvent.CTRL_MASK));
				menuEdit.add(itemCut);
				
				JMenuItem itemCopy = new JMenuItem("Copy");
				itemCopy.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225_Aastha/src/c7227225_Aastha/copy.png"));
				itemCopy.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_C, InputEvent.CTRL_MASK));
				menuEdit.add(itemCopy);
				
				JMenuItem itemPaste = new JMenuItem("Paste");
				itemPaste.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225_Aastha/src/c7227225_Aastha/paste.png"));
				itemPaste.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_V, InputEvent.CTRL_MASK));
				menuEdit.add(itemPaste);
				
				JMenuItem itemDelete = new JMenuItem("Delete");
				itemDelete.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_D, InputEvent.CTRL_MASK));
				menuEdit.add(itemDelete);
			
			// adding items to "HELP" menu
			JMenu menuHelp = new JMenu("Help");
			//adding components to the menu HELP
			menuBar.add(menuHelp);
			
				JMenuItem itemSearch = new JMenuItem("Search");
				itemSearch.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/c7227225/src/c7227225/search.png"));
				menuHelp.add(itemSearch);
				
				JMenuItem itemHelp = new JMenuItem("Help Content");
				menuHelp.add(itemHelp);
				
				JMenuItem itemAbout = new JMenuItem("About");
				itemAbout.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_A, InputEvent.CTRL_MASK));
				menuHelp.add(itemAbout);
				
					//showing a dialog box for the about option
					itemAbout.addActionListener(e -> {
						JOptionPane.showMessageDialog(this,
								"The application is built for the conversion between various currencies which is based on the conversion by File. "
										+ "\n" + "Author name: AASTHA NIRAULA" + "\n" + "\u00a9 2020-AASTHA");
					});
		//JMenuBar must have a return result
		return menuBar;	
	}
	
	//calling default constructor and adding components to the panel	
	CurrencyPanel()
	{
		setBackground(SystemColor.inactiveCaption);
		setBorder(new EtchedBorder(EtchedBorder.RAISED, null, null));
		setLayout(null);
		
		JLabel selectCurrency = new JLabel("Select Currency :");
		selectCurrency.setFont(new Font("Tahoma", Font.BOLD, 12));
		
		//manually designing the layout
		selectCurrency.setBounds(48, 19, 128, 21);
		selectCurrency.setHorizontalAlignment(SwingConstants.CENTER);
		//adding the components to the panel
		add(selectCurrency);
		
		//for comboBox 
		combo.setBackground(Color.WHITE);
		combo.setBounds(203, 16, 200, 21);
		combo.setToolTipText("The units for conversion are here");
		add(combo);
		
		//for entering the amount to be converted in the label
		amountLabel = new JLabel("Enter Amount :");
		amountLabel.setFont(new Font("Tahoma", Font.BOLD, 12));
		amountLabel.setBounds(69, 61, 118, 21);
		add(amountLabel);
		
		textField = new JTextField();
		textField.setBackground(Color.WHITE);
		textField.setBounds(216, 57, 162, 21);
		textField.setToolTipText("Enter the value to be converted here");
		add(textField);
		textField.setColumns(10);
		
		//for displaying result 
		label = new JLabel("Result : ---");
		label.setFont(new Font("Tahoma", Font.BOLD, 12));
		label.setBounds(77, 107, 144, 21);
		add(label);
		
		//using reverse conversion incase of wanting the currency to be reversed
		checkBox = new JCheckBox("Reverse Conversion");
		checkBox.setBackground(SystemColor.inactiveCaption);
		checkBox.setFont(new Font("Tahoma", Font.BOLD, 12));
		checkBox.setToolTipText("This changes the unit of conversion");
		checkBox.setBounds(247, 107, 156, 21);
		add(checkBox);
		
		//for count of the conversions
		countLabel = new JLabel("Conversion Count :");
		countLabel.setFont(new Font("Tahoma", Font.BOLD, 12));
		countLabel.setBounds(165, 150, 128, 21);
		add(countLabel);
		
		//for converting the value when convert button is clicked
		convertButton = new JButton("Convert");
		convertButton.setForeground(Color.WHITE);
		convertButton.setBackground(Color.DARK_GRAY);
		convertButton.setToolTipText("Press here to convert the unit");
		convertButton.setFont(new Font("Tahoma", Font.BOLD, 13));
		convertButton.addActionListener(listener);
		convertButton.setBounds(109, 195, 93, 42);
		add(convertButton);
		
			//for conversion when return is pressed
			textField.addKeyListener(new KeyAdapter()
			{
				public void keyPressed(KeyEvent e) 
				{
					//checking input for Enter key
					if (e.getKeyCode() == KeyEvent.VK_ENTER) 
					{
						convertButton.doClick(); //button click
					}
				}
			});
		
		//for clearing the given value and the result when reset button is clicked
		resetButton = new JButton("Reset");
			resetButton.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					textField.setText("");
					label.setText("Result : ---");
					countLabel.setText("Conversion count:" + Integer.toString(counter = 0));
				}
			});
		resetButton.setForeground(Color.WHITE);
		resetButton.setBackground(Color.DARK_GRAY);
		resetButton.setToolTipText("Press here to clear the value entered and returned");
		resetButton.setFont(new Font("Tahoma", Font.BOLD, 13));
		resetButton.setBounds(271, 195, 93, 42);
		add(resetButton);
		
	}
	
	//using open() to open a file 
	void fileOpen(File fileOpen)
	{
		
		//defining object for currency class
		Currency curr= new Currency(); 
		
		// for reading the line number where error is occured
		 int lineNumber = 1;
		 
		 //all the errors occured is stored and later displayed using joptionpane
		 String errors="";
		 try 
		 {
			 inputList.clear();
			 
			 //opening file and UTF8 method stores all the characters 
			 BufferedReader in = new BufferedReader(new InputStreamReader(new FileInputStream(fileOpen), "UTF8"));
			
			 //read data and reads single line as string 
			 String input = in.readLine(); 
			 
			 //until the data is null the loop runs 
			 while (input != null) 
			 {
				 //instantiating the object class
				  curr= new Currency();
				  
				 try 
				 {
					 //splits a single string from commas and makes list of strings 
					 String[] splitData =input.split(",");
					 
						 //checking the length of data 
						 if (splitData.length != 3) 
						 {
							 //adding into the string declared, error
							 errors += "The line is not valid at line: " + lineNumber +"\n";
							 
							//reading the next line of data 
							 input =in.readLine();
							 
							 //adding the line count everytime a single data line is read 
							 lineNumber++;
							 
							 //runs next loop 
							 continue;
						 }
						 //calling the method of Currency class
					 curr.setRate(Double.parseDouble(splitData[1]));
					 curr.setName(splitData[0]);	 
					 curr.setSymbol(splitData[2]);
				 }
				 
				 //string when converted to number shows error 
				 catch(NumberFormatException e) 
				 {
					 errors += "The rate of currency is not numeric at line: " + lineNumber + "\n";
					 input=in.readLine();
					 lineNumber++;
					 continue;
				 }
				 
				 input=in.readLine(); // reads nextLine
				 lineNumber++;
				 //object of currency object added to the arraylist 
				inputList.add(curr);
			 }
			 
			 if(errors.length() > 0) 
			 {
				 JOptionPane.showMessageDialog(this, "Errors occured : \n" + errors);
				 
			 }
				 //closing the file to save memory space
				 in.close();
				 //removig the existing data, and replacing by new additional data 
				 combo.removeAllItems();
				 
					 for(int i=0; i < inputList.size(); i++) 
					 {
						 combo.addItem(inputList.get(i).getName());
					 }	 
		 }
		 catch(Exception e) 
		 {
			 JOptionPane.showMessageDialog(this, e.getMessage());			 
		 }
	}
	
	//adding listener to the connvert Button
	private class ConvertListener implements ActionListener
	{
		//overriding the actionPerformed class for actions performed for convertButton
		@Override
		public void actionPerformed(ActionEvent e) 
		{
			//initializing a string that takes the input
			String text = textField.getText().trim(); 

				if (text.isEmpty() == true) 
				{
					//ensuring the text field is never empty	
					JOptionPane.showMessageDialog(null, "Please enter a value. \n The field cannot be empty.");		
				} 
				else 
				{
					try 
					{
						// conversion of input string to value
						double value = Double.parseDouble(text);
						String result = "";
						
						//returns value set in the currency file which is the number selected in the comboBox and.get is used to access data from arrayList
						double conversionRate = inputList.get(combo.getSelectedIndex()).getRate();
						String currencySymbol = inputList.get(combo.getSelectedIndex()).getSymbol();
							
							//for reverse conversion, applying formula based on conversion 
							if (!checkBox.isSelected()) 
							{
									//to display only 2 decimal	for the result
									result = currencySymbol + new DecimalFormat("0.00").format(value*conversionRate);
							} 
							else
							{
									result = "£ " + new DecimalFormat("0.00").format(value/conversionRate);
							}
							label.setText("Result: " + result);
							
							//adding the counter
							countLabel.setText("Conversion count:" + Integer.toString(++counter));
						}
	
						catch (Exception e1) 
						{
							//ensuring the input given is acceptable
							JOptionPane.showMessageDialog(null, "The value entered is non-numeric. \n Please enter a valid value.");
						}
				}		
		}
	}

}



	
	
