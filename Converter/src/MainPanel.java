/*This program is a GUI based application which is designed for the conversion between different units */

//importing all the java classes required in the program
import java.awt.Color;
import java.awt.Dimension;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.InputEvent;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.text.DecimalFormat;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.KeyStroke;

//inheriting the java class JPanel in MainPanel and implementing interface in the class
public class MainPanel extends JPanel implements ActionListener {

	//creating a list of string for JComboBox
	private final static String[] list = { "Inches/Cm", "Degrees/Radians", "Acres/Hectares", "Miles/Kilometres",
			"Yards/Metres ", "Celsius/Fahrenheit " };
	//contains elements inside the vector, String 
	private JComboBox<String> combo;
	
		//declaring instances
		JTextField textField;
		JLabel label, inputLabel, countLabel;
		JButton clearButton, convertButton;
		JCheckBox checkBox;
		int counter = 0;
		
		//function setting menuBar to the frame
		JMenuBar setupMenu() 
		{
			
			//creating a menubar on the frame
			JMenuBar menuBar = new JMenuBar();
			
			//adding menus to the menubar
			JMenu menuFile = new JMenu("File");
			JMenu menuEdit = new JMenu("Edit");
			JMenu menuHelp = new JMenu("Help");
	
				// adding items to "FILE" menu
				JMenuItem itemNew = new JMenuItem("New");
				
				//adding shortcut keys to the menu
				itemNew.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_N, InputEvent.CTRL_MASK));
				
				//adding icon to the menu
				itemNew.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/newfile.png"));
				
				JMenuItem itemOpen = new JMenuItem("Open");
				itemOpen.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_O, InputEvent.CTRL_MASK));
		
				JMenuItem itemSave = new JMenuItem("Save");
				itemSave.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_S, InputEvent.CTRL_MASK));
				itemSave.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/savefile.png"));
				
				JMenuItem itemExit = new JMenuItem("Exit");
				itemExit.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/CLOSE.png"));
				itemExit.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_W, InputEvent.CTRL_MASK));
				
				//exit when closed
				itemExit.addActionListener(e -> System.exit(0));
				
				//adding components to the menu FILE
				menuFile.add(itemNew);
				menuFile.add(itemOpen);
				menuFile.add(itemSave);
				menuFile.add(itemExit);
		
				// adding items to "EDIT" menu
				JMenuItem itemCut = new JMenuItem("Cut");
				itemCut.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_X, InputEvent.CTRL_MASK));
				itemCut.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/cut.png"));
				
				JMenuItem itemCopy = new JMenuItem("Copy");
				itemCopy.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_C, InputEvent.CTRL_MASK));
				itemCopy.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/copy.png"));
				
				JMenuItem itemPaste = new JMenuItem("Paste");
				itemPaste.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_V, InputEvent.CTRL_MASK));
				itemPaste.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/paste.png"));
				
				JMenuItem itemDelete = new JMenuItem("Delete");
				itemDelete.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_D, InputEvent.CTRL_MASK));
		
				//adding components to the menu EDIT
				menuEdit.add(itemCut);
				menuEdit.add(itemCopy);
				menuEdit.add(itemPaste);
				menuEdit.add(itemDelete);
	
				// adding items to "HELP" menu
				JMenuItem itemHelp = new JMenuItem("Help Contents");
				
				JMenuItem itemSearch = new JMenuItem("Search");
				itemSearch.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_S, InputEvent.CTRL_MASK));
				itemSearch.setIcon(new ImageIcon("D:/Users/aasth/eclipse-workspace/Converter/src/search.png"));
		
				JMenuItem itemAbout = new JMenuItem("About");
				itemAbout.setAccelerator(KeyStroke.getKeyStroke(KeyEvent.VK_A, InputEvent.CTRL_MASK));
				
				//showing a dialog box for the about option
				itemAbout.addActionListener(e -> {
					JOptionPane.showMessageDialog(this,
							"The application is built for the conversion between various fundamental units of measurement."
									+ "\n" + "Author name: AASTHA NIRAULA" + "\n" + "\u00a9 2020-AASTHA");
				});
		
				//adding components to the menu HELP
				menuHelp.add(itemHelp);
				menuHelp.add(itemSearch);
				menuHelp.add(itemAbout);
				
			//adding components to the menuBar	
			menuBar.add(menuFile);
			menuBar.add(menuEdit);
			menuBar.add(menuHelp);
			 
			//JMenuBar must have a return result
		return menuBar;
	}
			//calling default constructor and adding components to the panel
			MainPanel() 
			{	
				setLayout(null);
				setPreferredSize(new Dimension(500, 200));
				setBackground(Color.LIGHT_GRAY);
		
				//creating object storing instance of convert listener class, implementing ActionListener
					ActionListener listener = new ConvertListener(); 
				
					//for comboBox 
					combo = new JComboBox<String>(list); 
					//adding a popup message when cursor is placed
					combo.setToolTipText("The units for conversion are here");
					combo.setBounds(40, 20, 150, 30);
					
					//for entering the value in the label
					inputLabel = new JLabel("Enter value:");
					inputLabel.setToolTipText("Input the value for conversion here");
					inputLabel.setBounds(240, 20, 100, 30);
					
					textField = new JTextField(5);
					textField.setToolTipText("Enter the value to be converted here");
					textField.setBounds(320, 20, 130, 30);
					
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
					
					//for converting the value when convert button is clicked
					convertButton = new JButton("Convert");
					convertButton.setToolTipText("Press here to convert the unit");
					
					//adding listener to the convertButton
					convertButton.addActionListener(listener);
					
					//manually designing the layout
					convertButton.setBounds(130, 70, 100, 40);
					convertButton.setBackground(Color.DARK_GRAY);
					convertButton.setForeground(Color.WHITE);
					
					//for clearing the given value and the result when clear button is clicked
					clearButton = new JButton("Clear");
					clearButton.setToolTipText("Press here to clear the value entered and returned");
					
					clearButton.addActionListener(this);
					clearButton.setBounds(270, 70, 100, 40);
					clearButton.setBackground(Color.DARK_GRAY);
					clearButton.setForeground(Color.WHITE);
					
					label = new JLabel("--");
					label.setBounds(80, 125, 60,40);
					label.setToolTipText("The result after conversion");
					
					//for count of the conversions
					countLabel = new JLabel("Conversion count:" + (String.valueOf(counter)));
					countLabel.setToolTipText("This specifies the count of the conversion");
					countLabel.setBounds(170, 125, 120, 40);
					
					//using reverse conversion incase of wanting the units to be reversed
					checkBox = new JCheckBox("Reverse Conversion");
					checkBox.setToolTipText("This changes the unit of conversion");
					checkBox.setBounds(300, 125, 150, 40);
					checkBox.setBackground(Color.LIGHT_GRAY);
			
					//adding the components to the panel
					add(combo);
					add(inputLabel);
					add(textField);
					add(convertButton);
					add(clearButton);
					add(checkBox);
					add(label);
					add(countLabel);	
			}

	//adding listener to the connvert Button 		
	private class ConvertListener implements ActionListener {

		//overriding the actionPerformed class for actions performed for convertButton
		@Override
		public void actionPerformed(ActionEvent event) {		
			
			//initializing a string that takes the input 
			String text = textField.getText().trim(); 

			if (text.isEmpty() == true) 
			{
				//ensuring the text field is never empty	
				JOptionPane.showMessageDialog(null, "Please enter a value. \n The field cannot be empty.");		
			} 
			else {
					try {
						// conversion of iput string to value
						double value = Double.parseDouble(text);
	
						// the factor applied during the conversion
						double factor = 0;
	
						// the offset applied during the conversion.
						double offset = 0;
	
						double result = 0;
	
						// Setup the correct factor/offset values depending on required conversion
						switch (combo.getSelectedIndex()) {
	
						case 0: // inches/cm
							factor = 2.54;
							break;
						case 1: // Degrees/Radians
							factor = 0.0174533;
							break;
						case 2: // Acres/Hectares
							factor = 0.404686;
							break;
						case 3: // Miles/Kilometres
							factor = 1.60934;
							break;
						case 4: // Yards/Metres
							factor = 0.9144;
							break;
						case 5: // Celsius/Fahrenheit
							factor = 32;
							break;
						}					
							//for reverse conversion, applying formula based on conversion 
							if (checkBox.isSelected()) 
							{
								result = (value - offset) / factor;
							} else {
								result = factor * value + offset;
							}
						//to display only 2 decimal	for the result
						String s = new DecimalFormat("0.00").format(result);
						label.setText(s);
						
						//adding the counter
						countLabel.setText("Conversion count:" + Integer.toString(++counter));
					}
	
					catch (Exception e) {
						//ensuring the input given is acceptable
						JOptionPane.showMessageDialog(null, "The value entered is not numeric. \n Please enter a valid number.");
					}
			}
		}
	}

	//abstract method, overriding the actionPerformed class for actions performed for clearButton
	@Override
	public void actionPerformed(ActionEvent e) {
		Object obj = e.getSource();

		if (obj == clearButton) {
			//clear input field 
			textField.setText("");
			label.setText("--");
			countLabel.setText("Conversion count:" + Integer.toString(counter = 0));
		}
	}
}
